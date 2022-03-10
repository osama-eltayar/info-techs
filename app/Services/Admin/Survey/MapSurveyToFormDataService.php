<?php

namespace App\Services\Admin\Survey;

use App\Models\Survey;

class MapSurveyToFormDataService
{
    public function execute(Survey $survey)
    {
        $surveyData              = [];
        $surveyData['title']     = $survey->title;
        $surveyData['questions'] = $this->mapQuestions($survey);
        return $surveyData;
    }

    protected function mapQuestions($survey)
    {
        return $survey->questions->map(function ($question) {
            $data            = [];
            $data['title']   = $question->title;
            $data['type']    = $question->type;
            $data['answers'] = $this->mapAnswers($question);
            return $data;
        });
    }

    protected function mapAnswers($question)
    {
        return $question->answers->map(function ($answer) {
            $data           = [];
            $data['title']  = $answer->title;
            $data['labels'] = $this->mapLabels($answer);
            return $data;
        });
    }

    protected function mapLabels($answer)
    {
        return $answer->labels->map(function ($label) {
            $data          = [];
            $data['title'] = $label->title;
            return $data;
        });
    }
}
