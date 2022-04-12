<?php


namespace App\Services\Admin\User;


use App\Models\User;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class UpdateUserService
{
    public function execute(User $user,$data)
    {
        $userData = Arr::only($data,['name','email']);

        if ($data['password'])
            $userData['password'] = $data['password'];

        $user->update($userData);
        $user->roles()->sync(Role::findByName($data['role']));
    }
}
