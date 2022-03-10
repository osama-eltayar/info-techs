<?php

namespace App\Http\Requests\Admin;

use App\Models\SurveyQuestion;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SurveyRequest extends FormRequest
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
            'title'                                => ['required', 'string', 'unique:surveys,title,' . optional($this->survey)->id],
            'questions'                            => ['required', 'array', 'filled', 'distinct'],
            'questions.*'                          => ['required', 'array', 'filled', 'distinct'],
            'questions.*.title'                    => ['required', 'string'],
            'questions.*.type'                     => ['required', Rule::in(SurveyQuestion::TEXT, SurveyQuestion::RADIO, SurveyQuestion::CHECKBOX)],
            'questions.*.answers'                  => ['required', 'array', 'filled', 'distinct'],
            'questions.*.answers.*'                => ['required', 'array', 'filled', 'distinct'],
            'questions.*.answers.*.title'          => ['required', 'string'],
            'questions.*.answers.*.labels'         => ['required_if:questions.*.type,' . SurveyQuestion::RADIO, 'array'],
            'questions.*.answers.*.labels.*'       => ['required_if:questions.*.type,' . SurveyQuestion::RADIO, 'array'],
            'questions.*.answers.*.labels.*.title' => ['required_if:questions.*.type,' . SurveyQuestion::RADIO, 'string'],
        ];
    }
}
