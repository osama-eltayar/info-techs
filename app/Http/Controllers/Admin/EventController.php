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
use App\Services\Admin\Event\StoreEventService;
use App\Traits\HasFiles;
use Illuminate\Http\Response;

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
        $storeEventService->execute($request->all());
        return $this->successResponse([
            'redirect' => route('admin.events.index')
        ], 'Event Created Successfully.', Response::HTTP_CREATED);
    }
}
