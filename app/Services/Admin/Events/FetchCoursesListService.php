<?php

namespace App\Services\Admin\Events;

use App\Models\Course;

class FetchCoursesListService
{
    public function execute($filterData, $perPage = null)
    {
        return Course::query()
            ->with('organization')
            ->filter($filterData)
            ->requestSort()
            ->when(!$perPage, function ($q) {
                return $q->get();
            })
            ->when($perPage, function ($q) use ($perPage) {
                return $q->paginate($perPage);
            });
    }
}
