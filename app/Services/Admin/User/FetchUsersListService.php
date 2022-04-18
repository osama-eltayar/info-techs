<?php

namespace App\Services\Admin\User;

use App\Models\User;

class FetchUsersListService
{
    public function execute($filterData, $perPage = null)
    {
        return User::query()
                   ->user()
            ->with('profile')
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
