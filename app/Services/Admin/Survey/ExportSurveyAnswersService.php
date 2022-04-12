<?php


namespace App\Services\Admin\Survey;


use App\Exports\SurveyAnswersExport;
use App\Models\Course;
use App\Models\Survey;
use App\Models\SurveyUserAnswer;
use Maatwebsite\Excel\Facades\Excel;

class ExportSurveyAnswersService
{
    public function execute(Survey $survey,Course $event)
    {
        $answers = SurveyUserAnswer::query()
                        ->where('survey_id',$survey->id)
                        ->where('course_id',$event->id)
                        ->with('question','answer','user')
                        ->orderBy('user_id')
                        ->orderBy('question_id')
                        ->get();
        return Excel::download(new SurveyAnswersExport($answers),'answers.xlsx',null,[
            "Cache-Control: no-cache, must-revalidate",
            "Expires: Sat, 26 Jul 1997 05:00:00 GMT"
        ]);
    }
}
