<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Services\Admin\Events\FetchCoursesListService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private static int $perPage = 10;

    /**
     * 
     */
    public function index(Request $request, FetchCoursesListService $fetchEventListService)
    {
        $filterData = $request->only('start_date', 'end_date', 'organization_id', 'type_id');
        $courses = $fetchEventListService->execute($filterData, self::$perPage);
        $organizations = Organization::all();
        //get count of users

        if ($request->ajax())
            return view('admin.events.partials.events-list', compact(['courses', 'organizations']));


        return view('admin.events.index', compact('courses', 'organizations'));
    }
}
