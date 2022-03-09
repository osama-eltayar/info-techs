<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SurveyRequest;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Services\Admin\Survey\CreateSurveyService;
use App\Services\Admin\Survey\MapSurveyToFormDataService;
use App\Services\Admin\Survey\UpdateSurveyService;
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
        return $this->successResponse([
            'redirect' => route('admin.surveys.index')
        ], 'Survey Created Successfully.', Response::HTTP_CREATED);
    }

    public function edit(Survey $survey,MapSurveyToFormDataService $mapSurveyToFormDataService)
    {
        $questionTypes = SurveyQuestion::getMappedTypes();
        $survey->load('questions.answers.labels');
        $surveyData = $mapSurveyToFormDataService->execute($survey);
        return view('admin.surveys.edit',compact('questionTypes','survey','surveyData'));
    }

    public function update(SurveyRequest $request,Survey $survey,UpdateSurveyService $updateSurveyService)
    {
        //todo authorize prevent update when has user answer
        $updateSurveyService->execute($survey,$request->validated());
        return $this->successResponse([
            'redirect' => route('admin.surveys.index')
        ], 'Survey Updated Successfully.', Response::HTTP_CREATED);
    }


}
