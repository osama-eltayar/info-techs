<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\ShoppingCart;
use App\Models\User;
use App\Models\UserVideoTracker;
use App\Services\Admin\Event\FetchRegisteredUsersListService;
use App\Services\Admin\Event\User\FetchRegisteredUserListService;
use App\Services\Admin\Event\User\FetchTrackersListService;
use App\Services\Admin\User\ExportUserPdfReportService;
use App\Services\Admin\User\ExportUserProgressPdfReportService;
use App\Services\Admin\User\ExportUsersExcelReportService;
use App\Services\Admin\User\ExportUsersProgressExcelReportService;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    private static int $perPage = 10;

    public function show(Course $event, $user_id, FetchRegisteredUserListService $fetchRegisteredUserListService)
    {
        $user = $fetchRegisteredUserListService->execute($event->id, $user_id);
        $shopping_cart = ShoppingCart::where(['user_id' => $user_id, 'course_id' => $event->id])->first();
        $trackers = (new FetchTrackersListService)->execute($event->id, $user_id, self::$perPage);

        return view('admin.events.registered-users.show', compact('user', 'event', 'shopping_cart', 'trackers'));
    }
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

    public function progressExportPdf(Request $request, Course $event, $user_id, ExportUserProgressPdfReportService $exportUserProgressPdfReportService)
    {
        $trackers = (new FetchTrackersListService)->execute($event->id, $user_id, self::$perPage);
        return $exportUserProgressPdfReportService->execute($trackers);
    }

    public function progressExportExcel(Request $request, Course $event, $user_id, ExportUsersProgressExcelReportService $exportUsersProgressExcelReportService)
    {
        $trackers = (new FetchTrackersListService)->execute($event->id, $user_id, self::$perPage);
        return $exportUsersProgressExcelReportService->execute($trackers);
    }
}
