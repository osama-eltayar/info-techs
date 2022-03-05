<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SurveyRequest;
use App\Models\SurveyQuestion;
use App\Services\Admin\Survey\CreateSurveyService;
use Illuminate\Http\Response;

class SurveyController extends Controller
{
    public function create()
    {
        $questionTypes = SurveyQuestion::getMappedTypes();
        return view('admin.surveys.create',compact('questionTypes'));
    }

    public function store(SurveyRequest $request,CreateSurveyService $createSurveyService)
    {
        $createSurveyService->execute($request->validated());
//        return $this->successResponse([
//            'redirect' => route('admin.surveys.index')
//        ], 'Event Created Successfully.', Response::HTTP_CREATED);
    }
}
