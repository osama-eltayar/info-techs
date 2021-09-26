<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserVideoTracker;
use Illuminate\Http\Request;

class CourseVideoTrackerController extends Controller
{
    public function update(Request $request)
    {
        if ($request->time_progress > 100 )
            $request->merge(['time_progress' => 100]) ;

        UserVideoTracker::updateOrCreate($request->only('course_id', 'trackable_id', 'trackable_type') +
                                         ['user_id' => auth()->id()],
                                         $request->only('time_progress', 'check_point'));

        return response([]);
    }
}
