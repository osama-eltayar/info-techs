<?php

namespace App\Services\Admin\Event;

use App\Models\User;

class FetchRegisteredUsersListService
{
    public function execute($course_id, $perPage = null)
    {
        return User::query()
                    ->whereHas('registeredCourses', function ($q) use ($course_id) {
                        return $q->where('courses.id', $course_id);
                    }) 
                    ->with('registeredCourses', function ($q) use ($course_id) {
                        return $q->where('courses.id', $course_id);
                    })
                    ->when(!$perPage, function ($q) {
                         return $q->get();
                    })
                    ->when($perPage, function ($q) use ($perPage) {
                         return $q->paginate($perPage);
                    });
    }
}
