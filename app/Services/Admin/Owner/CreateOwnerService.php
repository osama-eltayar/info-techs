<?php

namespace App\Services\Admin\Owner;

use App\Models\User;
use App\Traits\HasFiles;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CreateOwnerService
{
    use HasFiles;
    public function execute(array $data)
    {
        DB::beginTransaction();
        $user = User::create($data['user_data']);
        $user->assignRole(User::OWNER);
        $organizationData = Arr::only($data['organization_data'],[
            'name_ar',
            'name_en',
            'user_id',
            'city_id',
            'country_id',
            'mobile'
        ]);
        $organization = $user->organization()->create($organizationData);
        $organization->update([
            'logo' => $this->storeFile('organizations',$data['organization_data']['logo'],$organization),
            'material' => $this->storeFile('organizations',$data['organization_data']['material'],$organization),
        ]);
        DB::commit();
        return compact('user','organization');
    }
}
