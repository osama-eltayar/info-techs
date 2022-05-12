<?php

namespace App\Services\Admin\Sponsor;

use App\Models\Sponsor;
use App\Models\User;
use App\Traits\HasFiles;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CreateSponsorService
{
    use HasFiles;

    public function execute(array $data)
    {

        DB::beginTransaction();
        $sponsorData = Arr::only($data['sponsor_data'],[
            'name_ar',
            'name_en',
            'city_id',
            'country_id',
            'mobile',
            'email'
        ]);
        $sponsor = Sponsor::create($sponsorData);
        $sponsor->update([
            'logo' => $this->storeFile('organizations',$data['sponsor_data']['logo'],$sponsor),
        ]);
        if (isset($data['sponsor_data']['material']))
            $sponsor->material()->create([
                'path' => $this->storeFile('sponsors',$data['sponsor_data']['material'],$sponsor),
                'mime_type' => $data['sponsor_data']['material']->getClientMimeType(),
                'name_ar'   => $data['sponsor_data']['material']->getClientOriginalName(),
                'name_en'   => $data['sponsor_data']['material']->getClientOriginalName(),
            ]);
        DB::commit();
        return compact('sponsor');
    }
}
