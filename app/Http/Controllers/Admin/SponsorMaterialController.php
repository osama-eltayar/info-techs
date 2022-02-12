<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use App\Models\SponsorMaterial;
use Illuminate\Support\Facades\Storage;

class SponsorMaterialController extends Controller
{
    public function download($sponsor,$material)
    {
        $material = SponsorMaterial::where('id',$material)->where('sponsor_id',$sponsor)->firstOrFail();
        return Storage::download($material->path,$material->name.'.pdf');
    }
}
