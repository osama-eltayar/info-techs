<?php


namespace App\Services\Admin\User;


use App\Models\User;

class StoreUserService
{
    public function execute($data)
    {
        return User::create($data)->assignRole($data['role']);
    }
}
