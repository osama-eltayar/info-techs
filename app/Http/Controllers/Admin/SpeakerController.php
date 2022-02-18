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
use App\Services\Admin\Speaker\ExportSpeakersExcelReportService;
use App\Services\Admin\Speaker\ExportSpeakersPdfReportService;
use App\Services\Admin\Speaker\FetchCoursesListService;
use App\Services\Admin\Speaker\UpdateSpeakerService;
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

    public function show(Speaker $speaker, FetchCoursesListService $fetchCoursesListService)
    {
        $courses = $fetchCoursesListService->execute($speaker->id, self::$perPage);

        $speaker->load('title', 'country', 'city', 'speciality')->setRelation('courses',$courses);
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
        $titles = UserTitle::all();
        $specialities = Speciality::all();
        return view('admin.speakers.edit', compact('speaker', 'titles' , 'specialities'));
    }

    public function update(SpeakerRequest $request, Speaker $speaker, UpdateSpeakerService $updateSpeakerService)
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
        $updateSpeakerService->execute([
            'speaker_data' => $speakerData,
            'speaker' => $speaker
        ]);

        return $this->successResponse([
            'redirect' => route('admin.speakers.index')
        ],'speaker Updated Successfully.',Response::HTTP_ACCEPTED);
    }

    public function destroy(Speaker $speaker)
    {
        $speaker->delete();
        return $this->successResponse([], 'Speaker Deleted Successfully.', Response::HTTP_ACCEPTED);
    }

    public function exportPdf(Request $request, ExportSpeakersPdfReportService $exportSpeakersPdfReportService, FetchSpeakersListService $fetchSpeakersListService)
    {
        $filterData = $request->only('name');
        $speakers = $fetchSpeakersListService->execute($filterData);
        return $exportSpeakersPdfReportService->execute($speakers);
    }

    public function exportExcel(Request $request, ExportSpeakersExcelReportService $exportSpeakersExcelReportService, FetchSpeakersListService $fetchSpeakersListService)
    {
        $filterData = $request->only('name');
        $speakers = $fetchSpeakersListService->execute($filterData);
        return $exportSpeakersExcelReportService->execute($speakers);
    }
}
