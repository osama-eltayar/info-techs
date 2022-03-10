<?php

namespace App\Http\Requests\User;

use App\Models\SurveyQuestionAnswer;
use App\Models\SurveyUserAnswer;
use Illuminate\Foundation\Http\FormRequest;

class SurveyUserAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'questions'     => ['required', 'array', 'filled', 'distinct'],
            'questions.*'   => ['required', 'array', 'filled', 'distinct'],
            'questions.*.*' => ['required', 'string'],
        ];
    }

    public function withValidator($validator)
    {
        if (!$validator->fails()) {
            $validator->after(function ($validator) {
                if ($this->course->survey_id != $this->survey->id)
                    $validator->errors()->add('survey', 'invalid survey.');
            });
        }
        if (!$validator->fails()) {
            $validator->after(function ($validator) {
                $exists = true;
                foreach ($this->questions as $questionId => $answer) {
                    if (!$exists)
                        break;
                    foreach ($answer as $answerId => $value) {
                        $exists = SurveyQuestionAnswer::where('id', $answerId)
                                                      ->whereHas('question', function ($q) use ($questionId) {
                                                          return $q->where('survey_questions.id',$questionId)->where('survey_id', $this->survey->id);
                                                      })
                                                      ->exists();
                        if (!$exists)
                            break;
                    }
                }
                if (!$exists)
                    $validator->errors()->add('questions', 'invalid questions or answer ids!');
            });
        }
    }
}
