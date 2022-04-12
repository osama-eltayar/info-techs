<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use App\Services\Admin\User\FetchCoursesListService;
use App\Services\Admin\User\ExportUserPdfReportService;
use App\Services\Admin\User\ExportUsersExcelReportService;
use App\Services\Admin\User\FetchUsersListService;
use App\Services\Admin\User\StoreUserService;
use App\Services\Admin\User\UpdateUserService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
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
        $registeredUsers = User::count();
        $activeUsers = User::whereNotNull('email_verified_at')->count();
        $nonActiveUsers = User::whereNull('email_verified_at')->count();
        $orderBy=[
            'col' => $request->order_by ?: 'id',
            'direction' => $request->order_direction ?: 'asc'
        ];

        if ($request->ajax())
            return view('admin.users.partials.users-list', compact(['users', 'registeredUsers', 'activeUsers', 'nonActiveUsers','orderBy']));

        return view('admin.users.index', compact('users', 'registeredUsers', 'activeUsers', 'nonActiveUsers','orderBy'));
    }

    public function create()
    {
        $roles = Role::query()->where('name','!=','owner')->get();
        return view('admin.users.create',compact('roles'));
    }

    public function store(UserRequest $request,StoreUserService $storeUserService)
    {
        $storeUserService->execute($request->validated());
        return $this->successResponse([
            'redirect' => route('admin.users.index')
        ],'User Create Successfully.',Response::HTTP_CREATED);
    }

    public function edit(User $user)
    {
        $roles = Role::query()->where('name','!=','owner')->get();
        return view('admin.users.edit',compact('roles','user'));
    }

    public function update(UserRequest $request,User $user,UpdateUserService $updateUserService)
    {
        $updateUserService->execute($user,$request->validated());
        return $this->successResponse([
            'redirect' => route('admin.users.index')
        ],'User Updated Successfully.',Response::HTTP_ACCEPTED);
    }

    public function show(User $user, FetchCoursesListService $fetchCoursesListService)
    {
        $courses = $fetchCoursesListService->execute($user->id, self::$perPage);
        // dd($courses->first()->shoppingCarts[0]->pivot);
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
