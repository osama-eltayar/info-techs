<?php

namespace App\Services\Admin\Course;

use App\Models\Course;

class FetchCoursesListService
{
    public function execute($organizationId, $perPage = null)
    {
        return Course::query()
                         ->withCount('registeredUsers')
                         ->where('organization_id', $organizationId)
                         ->when(!$perPage, function ($q) {
                             return $q->get();
                         })
                         ->when($perPage, function ($q) use ($perPage) {
                             return $q->paginate($perPage);
                         });
    }
}
