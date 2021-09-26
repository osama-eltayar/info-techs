<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\UserVideoTracker;
use Illuminate\Http\Request;

class AttendanceReportController extends Controller
{
    public function index(Course $course)
    {
        $course->load('authUserTrackers.trackable');
        $course->loadSum('authUserTrackers' , 'check_point');

//        $trackers = UserVideoTracker::query()
//                                    ->with('trackable')
//                                    ->where('course_id',$course)
//                                    ->where('user_id',auth()->id())
//                                    ->get();

        return view('user.courses.partials.attendance-report',compact('course'));
    }
}
