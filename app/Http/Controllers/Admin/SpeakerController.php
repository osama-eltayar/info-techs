<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\Speaker\FetchSpeakersListService;
use Illuminate\Http\Request;

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
}
