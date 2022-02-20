<?php

namespace App\Services\Admin\User;

use App\Models\Course;

class FetchCoursesListService
{
    public function execute($user_id, $perPage = null)
    {
        return Course::query()
            ->with(['registeredUsers' => function ($q) use ($user_id) {
                return $q->where('users.id', $user_id);
            }])
            ->with(['shoppingCarts' => function ($q) use ($user_id) {
                return $q->where('users.id', $user_id);
            }])
            ->whereHas('shoppingCarts', function ($q) use ($user_id) {
                return $q->where('users.id', $user_id);
            })
            ->whereHas('registeredUsers', function ($q) use ($user_id) {
                return $q->where('users.id', $user_id);
            })
            ->when(!$perPage, function ($q) {
                return $q->get();
            })
            ->when($perPage, function ($q) use ($perPage) {
                return $q->paginate($perPage);
            });
    }
}
