<?php

namespace App\Services\Admin\Owner;

use App\Models\Organization;
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
        ]);
        if (isset($data['organization_data']['materials']))
            $this->storeMaterials($organization,$data['organization_data']['materials']);
        DB::commit();
        return compact('user','organization');
    }

    protected function storeMaterials(Organization $owner,$materials)
    {
        foreach ($materials as $material)
            $owner->materials()->create([
                'name_en'   => $material->getClientOriginalName(),
                'name_ar'   => $material->getClientOriginalName(),
                'path'      => $this->storeFile('owners', $material, $owner),
                'mime_type' => $material->getClientMimeType()
            ]);
    }
}
