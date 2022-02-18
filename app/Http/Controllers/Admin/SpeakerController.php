<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SpeakerRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Speaker;
use App\Models\Speciality;
use App\Models\UserTitle;
use App\Services\Admin\Speaker\FetchSpeakersListService;
use App\Services\Admin\Speaker\CreateSpeakerService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class SpeakerController extends Controller
{
    private static int $perPage = 10;

    public function index(Request $request, FetchSpeakersListService $fetchSpeakersListService)
    {
        $filterData = $request->only('name');
        $speakers = $fetchSpeakersListService->execute($filterData, self::$perPage);
        if($request->ajax())
            return view('admin.speakers.partials.speakers-list', compact('speakers'));

        return view('admin.speakers.index', compact('speakers'));
    }

    public function show(Speaker $speaker)
    {
        $speaker->load('courses', 'title', 'country', 'city', 'speciality');
        return view('admin.speakers.show', compact('speaker'));
    }

    public function create()
    {
        $titles = UserTitle::all();
        $specialities = Speciality::all();
        return view('admin.speakers.create', compact('titles' , 'specialities'));
    }

    public function store(SpeakerRequest $request, CreateSpeakerService $createSpeakerService)
    {
        $speakerData = $request->only([
            'name_ar',
            'name_en',
            'image',
            'email',
            'mobile',
            'bio',
            'position',
            'user_title_id',
            'speciality_id',
            'country_id',
            'city_id'
        ]);
        $createSpeakerService->execute([
            'speaker_data' => $speakerData
        ]);

        return $this->successResponse([
            'redirect' => route('admin.speakers.index')
        ], 'Speaker Created Successfully.', Response::HTTP_CREATED);
    }


    public function edit(Speaker $speaker)
    {
        return view('admin.speakers.edit', compact('speaker'));
    }

    public function destroy(Speaker $speaker)
    {
        $speaker->delete();
        return $this->successResponse([],'Speaker Deleted Successfully.', Response::HTTP_ACCEPTED);
    }
}
