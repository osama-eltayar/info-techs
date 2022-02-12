<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Sponsor;
use App\Services\Admin\Course\ExportCoursesExcelReportService;
use App\Services\Admin\Course\ExportCoursesPdfReportService;
use App\Services\Admin\Course\FetchCoursesListService as FetchCoursesListForOwnerService;
use App\Services\Admin\Sponsor\FetchCoursesListService as FetchCoursesListForSponsorService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function exportPdf(Request $request,
                              $resourceType,
                              $resourceId,
                              ExportCoursesPdfReportService $exportCoursesPdfReportService
                              )
    {
        [
            'model' => $resourceModel,
            'coursesFetchService' => $coursesFetchService,
            'coursesReportView' => $coursesReportView
        ] =  $this->getMappedResource($resourceType);
        $resourceModel::findOrFail($resourceId);
        $courses = (new($coursesFetchService))->execute($resourceId);
        return $exportCoursesPdfReportService->setView($coursesReportView)->execute($courses);
    }

    public function exportExcel(Request $request,
                                $resourceType,
                                $resourceId,
                                ExportCoursesExcelReportService $exportCoursesExcelReportService
                                )
    {
        [
            'model' => $resourceModel,
            'coursesFetchService' => $coursesFetchService,
            'coursesReportView' => $coursesReportView
        ] =  $this->getMappedResource($resourceType);

        $resourceModel::findOrFail($resourceId);
        $courses = (new($coursesFetchService))->execute($resourceId);
        return $exportCoursesExcelReportService->setView($coursesReportView)->execute($courses);
    }

    private function getMappedResource($resource)
    {
        $mappedResources = [
            'owners' => [
                'model' => Organization::class,
                'coursesFetchService' => FetchCoursesListForOwnerService::class,
                'coursesReportView' => 'admin.courses.owner-report'
            ],
            'sponsors' => [
                'model' => Sponsor::class,
                'coursesFetchService' => FetchCoursesListForSponsorService::class,
                'coursesReportView' => 'admin.courses.sponsor-report'
            ]
        ];
        return $mappedResources[$resource];
    }
}
