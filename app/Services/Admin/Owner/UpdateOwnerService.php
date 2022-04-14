<?php

namespace App\Services\Admin\Owner;

use App\Models\Organization;
use App\Models\User;
use App\Traits\HasFiles;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UpdateOwnerService
{
    use HasFiles;

    public function execute(array $data)
    {
        DB::beginTransaction();
        $data[ 'owner' ]->user->update($data[ 'user_data' ]);
        $organizationData = Arr::only($data[ 'organization_data' ], [
            'name_ar',
            'name_en',
            'city_id',
            'country_id',
            'mobile'
        ]);
        $data[ 'owner' ]->update($organizationData);

        $files = [];
        if ( isset($data[ 'organization_data' ][ 'logo' ] ))
            $files[ 'logo' ] = $this->storeFile('organizations', $data[ 'organization_data' ][ 'logo' ], $data[ 'owner' ]);
        if ( isset($data[ 'organization_data' ][ 'materials' ]) )
            $this->storeMaterials($data[ 'owner' ],$data['organization_data']['materials']);

        $data[ 'owner' ]->update($files);

        DB::commit();
        return [
            'user'  => $data[ 'owner' ]->user,
            'owner' => $data[ 'owner' ]
        ];
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
