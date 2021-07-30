<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function show($path)
    {
        $file = Storage::disk('local')->get($path);
        $mime = Storage::disk('local')->mimeType($path);
        // don't forget handle if file not exists
        return response($file)->header('Content-Type',$mime);
    }

    public function download($path)
    {
        return Storage::download($path);
    }

}
