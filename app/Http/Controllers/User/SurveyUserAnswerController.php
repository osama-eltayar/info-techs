<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\SurveyUserAnswerRequest;
use App\Models\Course;
use App\Models\Survey;
use App\Models\SurveyUserAnswer;
use Illuminate\Support\Facades\Auth;

class SurveyUserAnswerController extends Controller
{
    public function store(Course $course,Survey $survey,SurveyUserAnswerRequest $request)
    {

        if(SurveyUserAnswer::where('user_id',Auth::id())
                        ->where('course_id',$course->id)
                        ->where('survey_id',$survey->id)
                        ->exists())
            abort(403,'cannot answer survey twice.');

        foreach ($request->questions as $questionId => $answer)
            foreach ($answer as $answerId => $value)
            {
                SurveyUserAnswer::create([
                    "value"       => $value,
                    "user_id"     => Auth::id(),
                    "answer_id"   => $answerId,
                    "question_id" => $questionId,
                    "survey_id"   => $survey->id,
                    "course_id"   => $course->id,
                ]);
            }

        return $this->successResponse([
            'message' => 'Survey Saved Successfully.'
        ]);
    }
}
