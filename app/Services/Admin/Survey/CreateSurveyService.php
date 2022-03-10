<?php

namespace App\Services\Admin\Survey;

use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\SurveyQuestionAnswer;
use Illuminate\Support\Arr;

class CreateSurveyService
{
    /**
     ** @var Survey
     * */
    protected $survey;
    /**
     ** @var array
     * */
    protected $data;

    public function execute($data)
    {
        $this->data   = $data;
        $this->survey = Survey::create(Arr::only($this->data, ['title']));
        $this->saveQuestions();
    }

    protected function saveQuestions()
    {
        foreach ($this->data['questions'] as $questionData) {
            $question = $this->survey->questions()->create(Arr::only($questionData, ['title', 'type']));
            $this->saveAnswers($question, $questionData['answers'], $questionData['type']);
        }
    }

    protected function saveAnswers(SurveyQuestion $question, $answersData, $questionType)
    {
        foreach ($answersData as $answerData) {
            $answer = $question->answers()->create(Arr::only($answerData, ['title']));
            if ($questionType == SurveyQuestion::RADIO)
                $this->saveLabels($answer, $answerData['labels']);
        }
    }

    protected function saveLabels(SurveyQuestionAnswer $answer, $labelsData)
    {
        foreach ($labelsData as $labelData) {
            $answer->labels()->create(Arr::only($labelData, ['title']));
        }
    }


}
