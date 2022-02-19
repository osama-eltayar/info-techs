<?php

namespace App\Http\Controllers\Admin;

use App\Enums\SponsorTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventRequest;
use App\Models\Country;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\Organization;
use App\Models\Speaker;
use App\Models\Speciality;
use App\Models\Sponsor;
use App\Services\Admin\Event\MapEventToFormDataService;
use App\Services\Admin\Event\StoreEventService;
use App\Services\Admin\Event\UpdateEventService;
use App\Traits\HasFiles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class EventController extends Controller
{
    use HasFiles;

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
//        dd($request->all());
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
        $updateEventService->execute($request->all(),$event);
        return $this->successResponse([
            'redirect' => route('admin.events.index')
        ], 'Event Updated Successfully.', Response::HTTP_ACCEPTED);
    }
}
