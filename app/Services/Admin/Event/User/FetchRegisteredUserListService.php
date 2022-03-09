<?php

namespace App\Services\Admin\Event\User;

use App\Models\User;

class FetchRegisteredUserListService
{
    public function execute($event_id, $user_id)
    {
        return User::query()
            ->where('id', $user_id)
            ->with('registeredCourses', function ($q) use ($event_id) {
                return $q->where('courses.id', $event_id);
            })
            ->with('shoppingCart')
            ->first();
    }
}
