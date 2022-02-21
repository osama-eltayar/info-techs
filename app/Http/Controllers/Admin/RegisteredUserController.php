<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Services\Admin\Event\FetchRegisteredUsersListService;
use App\Services\Admin\User\ExportUserPdfReportService;
use App\Services\Admin\User\ExportUsersExcelReportService;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function exportPdf(Request $request, Course $event, ExportUserPdfReportService $exportUserPdfReportService)
    {
        $users = (new FetchRegisteredUsersListService)->execute($event->id);
        return $exportUserPdfReportService->setView('admin.events.event-report')->execute($users);
    }

    public function exportExcel(Request $request, Course $event, ExportUsersExcelReportService $exportUsersExcelReportService)
    {
        $users = (new FetchRegisteredUsersListService)->execute($event->id);
        return $exportUsersExcelReportService->setView('admin.events.event-report')->execute($users);
    }
}
