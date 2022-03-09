<?php

namespace App\Services\Admin\Event\User;

use App\Models\User;
use App\Models\UserVideoTracker;

class FetchTrackersListService
{
    public function execute($event_id, $user_id, $perPage = null)
    {
        return UserVideoTracker::query()
            ->where(['user_id' => $user_id, 'course_id' => $event_id])
            ->when(!$perPage, function ($q) {
                return $q->get();
            })
            ->when($perPage, function ($q) use ($perPage) {
                return $q->paginate($perPage);
            });
    }
}
