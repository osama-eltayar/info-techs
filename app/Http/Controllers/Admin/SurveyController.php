<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SurveyRequest;
use App\Models\Course;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Services\Admin\Course\FetchCoursesListService;
use App\Services\Admin\Survey\CreateSurveyService;
use App\Services\Admin\Survey\ExportSurveyAnswersService;
use App\Services\Admin\Survey\FetchQuestionsListService;
use App\Services\Admin\Survey\FetchSurveyListService;
use App\Services\Admin\Survey\MapSurveyToFormDataService;
use App\Services\Admin\Survey\UpdateSurveyService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SurveyController extends Controller
{
    private static int $perPage = 10;
    public function index(Request $request, FetchSurveyListService $fetchSurveyListService)
    {
        $filterData = $request->only(['title']);

        $surveys = $fetchSurveyListService->execute(self::$perPage);

        if ($request->ajax())
            return view('admin.surveys.partials.surveys-list', compact('surveys'));

        return view('admin.surveys.index', compact('surveys'));
    }

    public function show(Survey $survey, FetchQuestionsListService $fetchQuestionsListService)
    {
        $questions = $fetchQuestionsListService->execute($survey->id, self::$perPage);
        $survey->setRelation('questions', $questions);
        return view('admin.surveys.show',compact('survey','questions'));
    }

    public function create()
    {
        $questionTypes = SurveyQuestion::getMappedTypes();
        return view('admin.surveys.create', compact('questionTypes'));
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
        return view('admin.surveys.edit', compact('questionTypes', 'survey', 'surveyData'));
    }

    public function update(SurveyRequest $request,Survey $survey,UpdateSurveyService $updateSurveyService)
    {
        //todo authorize prevent update when has user answer
        $updateSurveyService->execute($survey,$request->validated());
        return $this->successResponse([
            'redirect' => route('admin.surveys.index')
        ], 'Survey Updated Successfully.', Response::HTTP_CREATED);
    }

    public function exportAnswers(Course $event,Survey $survey,ExportSurveyAnswersService $exportSurveyAnswersService)
    {
        abort_if($event->survey_id != $survey->id,403);
        return $exportSurveyAnswersService->execute($survey,$event);
    }
}
