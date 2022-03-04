<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\ShoppingCart;
use App\Models\User;
use App\Models\UserVideoTracker;
use App\Services\Admin\Event\FetchRegisteredUsersListService;
use App\Services\Admin\User\ExportUserPdfReportService;
use App\Services\Admin\User\ExportUserProgressPdfReportService;
use App\Services\Admin\User\ExportUsersExcelReportService;
use App\Services\Admin\User\ExportUsersProgressExcelReportService;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    private static int $perPage = 10;

    public function show(Course $event, $user_id)
    {
        $user = User::where('id', $user_id)->with('registeredCourses', function ($q) use ($event) {
            return $q->where('courses.id', $event->id);
        })->with('shoppingCart')->first();

        $shopping_cart = ShoppingCart::where(['user_id' => $user_id, 'course_id' => $event->id])->first();
        $trackers = UserVideoTracker::where(['user_id' => $user_id, 'course_id' => $event->id])->paginate(self::$perPage);

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
        $trackers = UserVideoTracker::where(['user_id' => $user_id, 'course_id' => $event->id])->paginate(self::$perPage);
        return $exportUserProgressPdfReportService->execute($trackers);
    }

    public function progressExportExcel(Request $request, Course $event, $user_id, ExportUsersProgressExcelReportService $exportUsersProgressExcelReportService)
    {
        $trackers = UserVideoTracker::where(['user_id' => $user_id, 'course_id' => $event->id])->paginate(self::$perPage);
        return $exportUsersProgressExcelReportService->execute($trackers);
    }
}
