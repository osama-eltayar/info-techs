<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\Course\ExportCoursesExcelReportService;
use App\Services\Admin\Course\ExportCoursesPdfReportService;
use App\Services\Admin\Course\FetchCoursesListService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function exportPdf(Request $request,FetchCoursesListService $fetchCoursesListService,ExportCoursesPdfReportService $exportCoursesPdfReportService)
    {
        $courses = $fetchCoursesListService->execute($request->owner);
        return $exportCoursesPdfReportService->execute($courses);
    }

    public function exportExcel(Request $request,FetchCoursesListService $fetchCoursesListService,ExportCoursesExcelReportService $exportCoursesExcelReportService)
    {
        $courses = $fetchCoursesListService->execute($request->owner);
        return $exportCoursesExcelReportService->execute($courses);
    }
}
