<?php

namespace App\Services\Admin\Speaker;

use App\Models\Speaker;

use App\Traits\HasFiles;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CreateSpeakerService
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
        $speaker = Speaker::create($speakerData);
        $speaker->update([
            'image' => $this->storeFile('speakers', $data['speaker_data']['image'], $speaker),
        ]);

        DB::commit();
        return compact('speaker');
    }
}
