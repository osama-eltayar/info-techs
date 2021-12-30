<?php


namespace App\Services\User;


use App\Models\Course;

class ViewCounterService
{
    public function execute(Course $course, $ip, $userId)
    {
        $isViewedBefore = $course->views()->where(function ($query) use ($ip, $userId) {
            $query->where('user_id', $userId)->orWhere('ip', $ip);
        })->exists();

        if (!$isViewedBefore)
            $course->views()->create(['user_id' => $userId, 'ip' => $ip]);

    }
}