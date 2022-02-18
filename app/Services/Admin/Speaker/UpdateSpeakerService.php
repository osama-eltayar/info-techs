<?php

namespace App\Services\Admin\Speaker;

use App\Models\User;
use App\Traits\HasFiles;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UpdateSpeakerService
{
    use HasFiles;
    public function execute(array $data)
    {
        DB::beginTransaction();
        $speakerData = Arr::only($data['speaker_data'],[
            'name_ar',
            'name_en',
            'mobile',
            'bio',
            'email',
            'position',
            'user_title_id',
            'speciality_id',
            'country_id',
            'city_id'
        ]);
        $data[ 'speaker' ]->update($speakerData);

        $files = [];
        if ( isset($data[ 'speaker_data' ][ 'image' ] ))
            $files[ 'image' ] = $this->storeFile('organizations', $data[ 'speaker_data' ][ 'image' ], $data[ 'speaker' ]);

        $data[ 'speaker' ]->update($files);

        DB::commit();
        return [
            'user'  => $data[ 'speaker' ]->user,
            'speaker' => $data[ 'speaker' ]
        ];
    }
}
