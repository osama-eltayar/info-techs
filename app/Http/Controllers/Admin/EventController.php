<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class EventController extends Controller
{
    

    public function show(Course $event)
    {
        // $courses =$fetchCoursesListService->execute($course->id,self::$perPage);
        // $course->setRelation('courses',$courses);
        return view('admin.events.show', compact('event'));
    }
}
