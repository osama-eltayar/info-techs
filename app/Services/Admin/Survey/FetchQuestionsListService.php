<?php

namespace App\Services\Admin\Survey;

use App\Models\SurveyQuestion;

class FetchQuestionsListService
{
    public function execute($surveyId, $perPage = null)
    {
        return SurveyQuestion::query()
            ->where('survey_id', $surveyId)
            ->with('answers','answers.labels')
            ->when(!$perPage, function ($q) {
                return $q->get();
            })
            ->when($perPage, function ($q) use ($perPage) {
                return $q->paginate($perPage);
            });
    }
}
