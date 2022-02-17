<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speaker;
use App\Services\Admin\Speaker\FetchSpeakersListService;
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
        return view('admin.speakers.create');
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
