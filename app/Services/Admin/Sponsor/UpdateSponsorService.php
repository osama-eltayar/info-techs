<?php

namespace App\Services\Admin\Sponsor;

use App\Models\User;
use App\Traits\HasFiles;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UpdateSponsorService
{
    use HasFiles;

    public function execute(array $data)
    {
        DB::beginTransaction();
        $data[ 'sponsor' ]->user->update($data[ 'user_data' ]);
        $organizationData = Arr::only($data[ 'organization_data' ], [
            'name_ar',
            'name_en',
            'city_id',
            'country_id',
            'mobile'
        ]);
        $data[ 'sponsor' ]->update($organizationData);

        $files = [];
        if ( isset($data[ 'organization_data' ][ 'logo' ] ))
            $files[ 'logo' ] = $this->storeFile('organizations', $data[ 'organization_data' ][ 'logo' ], $data[ 'sponsor' ]);
        if ( isset($data[ 'organization_data' ][ 'material' ]) )
            $files[ 'material' ] = $this->storeFile('organizations', $data[ 'organization_data' ][ 'material' ], $data[ 'sponsor' ]);
        $data[ 'sponsor' ]->update($files);

        DB::commit();
        return [
            'user'  => $data[ 'sponsor' ]->user,
            'sponsor' => $data[ 'sponsor' ]
        ];
    }
}
