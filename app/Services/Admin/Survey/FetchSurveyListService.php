<?php

namespace App\Services\Admin\Survey;

use App\Models\Survey;

class FetchSurveyListService
{
    public function execute($perPage = null)
    {
        return Survey::query()
            ->when(!$perPage, function ($q) {
                return $q->get();
            })
            ->when($perPage, function ($q) use ($perPage) {
                return $q->paginate($perPage);
            });
    }
}
