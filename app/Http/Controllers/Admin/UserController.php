<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Admin\User\FetchCoursesListService;
use App\Services\Admin\User\ExportUserPdfReportService;
use App\Services\Admin\User\ExportUsersExcelReportService;
use App\Services\Admin\User\FetchUsersListService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    private static int $perPage = 10;

    /**
     *
     */
    public function index(Request $request, FetchUsersListService $fetchUserListService)
    {
        $filterData = $request->only(['name', 'email', 'created_at', 'status']);
        $users = $fetchUserListService->execute($filterData, self::$perPage);
        //get count of users
        $registeredUsers = User::user()->count();
        $activeUsers = User::user()->whereNotNull('email_verified_at')->count();
        $nonActiveUsers = User::user()->whereNull('email_verified_at')->count();

        if ($request->ajax())
            return view('admin.users.partials.users-list', compact(['users', 'registeredUsers', 'activeUsers', 'nonActiveUsers']));

        return view('admin.users.index', compact('users', 'registeredUsers', 'activeUsers', 'nonActiveUsers'));
    }

    public function show(User $user, FetchCoursesListService $fetchCoursesListService)
    {
        $courses = $fetchCoursesListService->execute($user->id, self::$perPage);
        $user->setRelation('courses', $courses);
        return view('admin.users.show', compact('user', 'courses'));
    }

    public function destroy(User $user)
    {
        //todo authorize
        $user->delete();
        return $this->successResponse([], 'User Deleted Successfully.', Response::HTTP_ACCEPTED);
    }

    public function exportPdf(Request $request, ExportUserPdfReportService $exportUserPdfReportService, FetchUsersListService $fetchUserListService)
    {
        $filterData = $request->only('name', 'email', 'created_at', 'status');
        $users = $fetchUserListService->execute($filterData);
        return $exportUserPdfReportService->execute($users);
    }

    public function exportExcel(Request $request, ExportUsersExcelReportService $exportUserExcelReportService, FetchUsersListService $fetchUserListService)
    {
        $filterData = $request->only('name', 'email', 'created_at', 'status');
        $sponsors = $fetchUserListService->execute($filterData);
        return $exportUserExcelReportService->execute($sponsors);
    }
}
