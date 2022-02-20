<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Services\Admin\Events\FetchCoursesListService;
use App\Models\Course;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private static int $perPage = 10;

    /**
     * 
     */
    public function index(Request $request, FetchCoursesListService $fetchEventListService)
    {
        $filterData = $request->only('start_date', 'end_date', 'organization_id', 'type');
        $courses = $fetchEventListService->execute($filterData, self::$perPage);
        $organizations = Organization::all();
        //get count of users

        if ($request->ajax()) {
            return view('admin.events.partials.events-list', compact(['courses', 'organizations']));
        }



        return view('admin.events.index', compact('courses', 'organizations'));
    }
    

    public function show(Course $event)
    {
        // $courses =$fetchCoursesListService->execute($course->id,self::$perPage);
        // $course->setRelation('courses',$courses);
        return view('admin.events.show', compact('event'));
    }
}
