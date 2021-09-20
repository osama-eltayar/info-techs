<?php

namespace App\Http\Controllers;

use App\Models\CourseVideo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function show($path)
    {
        if (Str::contains($path, '/videos/'))
            abort(404);

        $file = Storage::disk('local')->get($path);
        $mime = Storage::disk('local')->mimeType($path);
        // don't forget handle if file not exists
        return response($file)->header('Content-Type',$mime);
    }

    public function download($path)
    {
        return Storage::download($path);
    }

    public function video($path)
    {
        $video = CourseVideo::query()
                            ->where('path', $path)
                            ->where(function ($query) {
                                $query->free()
                                      ->orWhereHas('course.registeredAuthUser');
                            })
                            ->firstOrFail();

        if (auth()->check())
            $video->trackers()->firstOrCreate(['course_id' => $video->course_id, 'user_id' => auth()->id()],
                                              ['time_progress' => 0, 'check_point' => 0]);

        $file = Storage::disk('video')->get($path);
        $mime = Storage::disk('video')->mimeType($path);
        return response($file)->header('Content-Type', $mime);
    }

}
