<?php

namespace App\Http\Controllers\Admin;

use App\Enums\SponsorTypeEnum;
use App\Http\Requests\Admin\EventRequest;
use App\Models\Country;
use App\Models\CourseType;
use App\Models\Speaker;
use App\Models\Speciality;
use App\Models\Sponsor;
use App\Services\Admin\Event\MapEventToFormDataService;
use App\Services\Admin\Event\StoreEventService;
use App\Services\Admin\Event\UpdateEventService;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Services\Admin\Events\FetchCoursesListService;
use App\Models\Course;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private static int $perPage = 10;

    public function create()
    {
        $courseTypes  = CourseType::all();
        $specialities = Speciality::all();
        $owners       = Organization::all();
        $countries    = Country::all();
        $sponsorTypes = SponsorTypeEnum::MAPPED_TYPES;
        $sponsors     = Sponsor::all();
        $speakers     = Speaker::all();
        $chairPersons = $speakers;
        return view('admin.events.create', compact(
            'countries',
            'courseTypes',
            'owners',
            'specialities',
            'sponsorTypes',
            'sponsors',
            'speakers',
            'chairPersons'
        ));
    }

    public function store(EventRequest $request, StoreEventService $storeEventService)
    {
        $storeEventService->execute($request->all());
        return $this->successResponse([
            'redirect' => route('admin.events.index')
        ], 'Event Created Successfully.', Response::HTTP_CREATED);
    }

    public function edit(Course $event,MapEventToFormDataService $mapEventToFormDataService)
    {
        $courseTypes  = CourseType::all();
        $specialities = Speciality::all();
        $owners       = Organization::all();
        $countries    = Country::all();
        $sponsorTypes = SponsorTypeEnum::MAPPED_TYPES;
        $sponsors     = Sponsor::all();
        $speakers     = Speaker::all();
        $chairPersons = $speakers;
        $eventData = $mapEventToFormDataService->execute($event);
        return view('admin.events.edit', compact(
            'countries',
            'courseTypes',
            'owners',
            'specialities',
            'sponsorTypes',
            'sponsors',
            'speakers',
            'chairPersons',
            'eventData',
            'event'
        ));

    }

    public function update(Course $event, EventRequest $request,UpdateEventService $updateEventService)
    {
        $updateEventService->execute($request->all(), $event);
        return $this->successResponse([
            'redirect' => route('admin.events.index')
        ], 'Event Updated Successfully.', Response::HTTP_ACCEPTED);
    }

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
