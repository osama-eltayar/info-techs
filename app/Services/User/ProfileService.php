<?php


namespace App\Services\User;


use App\Enums\StorageTree;
use App\Traits\HasFiles;
use Illuminate\Support\Arr;

class ProfileService
{
    use HasFiles;

    /**
     * @param array $data
     */
    public function execute(array $data)
    {
        auth()->user()->update(['name' => Arr::get($data, 'user.name')]);

        if ($image = Arr::pull($data, 'profile.image'))
            $data['profile']['image'] = $this->storeFile(StorageTree::USERS, $image);

        auth()->user()->profile()->updateOrCreate(['user_id' => auth()->id()], $data['profile']);
    }
}
