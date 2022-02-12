<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OwnerRequest;
use App\Models\City;
use App\Models\Course;
use App\Models\Organization;
use App\Services\Admin\Course\FetchCoursesListService;
use App\Services\Admin\Owner\CreateOwnerService;
use App\Services\Admin\Owner\ExportOwnersExcelReportService;
use App\Services\Admin\Owner\ExportOwnersPdfReportService;
use App\Services\Admin\Owner\FetchOwnersListService;
use App\Services\Admin\Owner\UpdateOwnerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class OwnerController extends Controller
{
    private static int $perPage = 10;

    public function index(Request $request, FetchOwnersListService $fetchOwnersListService)
    {
        $filterData = $request->only('name');
        $owners = $fetchOwnersListService->execute($filterData,self::$perPage);
        if($request->ajax())
            return view('admin.owners.partials.owners-list',compact('owners'));

        return view('admin.owners.index',compact('owners'));
    }

    public function show(Organization $owner,FetchCoursesListService $fetchCoursesListService)
    {
        $courses =$fetchCoursesListService->execute($owner->id,self::$perPage);
        $owner->setRelation('courses',$courses);
        return view('admin.owners.show',compact('owner'));
    }

    public function create()
    {
        return view('admin.owners.create');
    }

    public function store(OwnerRequest $request,CreateOwnerService $createOwnerService)
    {
        $userData = $request->only('email','password') + [ 'name' => $request->name_en ];
        $organizationData = $request->only([
            'name_ar',
            'name_en',
            'logo',
            'material',
            'user_id',
            'city_id',
            'country_id',
            'mobile'
        ]);
        $createOwnerService->execute([
            'user_data'         => $userData,
            'organization_data' => $organizationData
        ]);

        return $this->successResponse([
            'redirect' => route('admin.owners.index')
        ],'Owner Created Successfully.',Response::HTTP_CREATED);
    }

    public function exportPdf(Request $request,ExportOwnersPdfReportService $exportOwnersPdfReportService,FetchOwnersListService $fetchOwnersListService)
    {
        $filterData = $request->only('name');
        $owners = $fetchOwnersListService->execute($filterData);
        return $exportOwnersPdfReportService->execute($owners);
    }

    public function exportExcel(Request $request,ExportOwnersExcelReportService $exportOwnersExcelReportService,FetchOwnersListService $fetchOwnersListService)
    {
        $filterData = $request->only('name');
        $owners = $fetchOwnersListService->execute($filterData);
        return $exportOwnersExcelReportService->execute($owners);
    }

    public function edit(Organization $owner)
    {
        return view('admin.owners.edit',compact('owner'));
    }

    public function update(OwnerRequest $request,Organization $owner,UpdateOwnerService $updateOwnerService)
    {
        $userData = $request->only('email','password') + [ 'name' => $request->name_en ];
        $organizationData = $request->only([
            'name_ar',
            'name_en',
            'logo',
            'material',
            'user_id',
            'city_id',
            'country_id',
            'mobile'
        ]);
        $updateOwnerService->execute([
            'user_data'         => $userData,
            'organization_data' => $organizationData,
            'owner' => $owner
        ]);

        return $this->successResponse([
            'redirect' => route('admin.owners.index')
        ],'Owner Updated Successfully.',Response::HTTP_ACCEPTED);
    }

    public function destroy(Organization $owner)
    {
        //todo authorize
        $owner->delete();
        return $this->successResponse([],'Owner Deleted Successfully.',Response::HTTP_ACCEPTED);
    }

    public function downloadMaterial(Organization $owner)
    {
        return Storage::download($owner->material,$owner->name.'.pdf');
    }
}
