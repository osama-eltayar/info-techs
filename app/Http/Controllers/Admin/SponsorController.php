<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SponsorRequest;
use App\Models\City;
use App\Models\Course;
use App\Models\Organization;
use App\Models\Sponsor;
use App\Services\Admin\Sponsor\FetchCoursesListService;
use App\Services\Admin\Sponsor\CreateSponsorService;
use App\Services\Admin\Sponsor\ExportSponsorsExcelReportService;
use App\Services\Admin\Sponsor\ExportSponsorsPdfReportService;
use App\Services\Admin\Sponsor\FetchSponsorsListService;
use App\Services\Admin\Sponsor\UpdateSponsorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class SponsorController extends Controller
{
    private static int $perPage = 10;

    public function index(Request $request, FetchSponsorsListService $fetchSponsorListService)
    {
        $filterData = $request->only('name');
        $sponsors = $fetchSponsorListService->execute($filterData,self::$perPage);
        if($request->ajax())
            return view('admin.sponsors.partials.sponsors-list',compact('sponsors'));

        return view('admin.sponsors.index',compact('sponsors'));
    }

    public function show(Sponsor $sponsor, FetchCoursesListService $fetchCoursesListService)
    {
        $courses = $fetchCoursesListService->execute($sponsor->id, self::$perPage);
        $sponsor->setRelation('courses', $courses);
        return view('admin.sponsors.show',compact('sponsor'));
    }

    public function create()
    {
        return view('admin.sponsors.create');
    }

    public function store(SponsorRequest $request,CreateSponsorService $createSponsorService)
    {
        $sponsorData = $request->only([
            'name_ar',
            'name_en',
            'logo',
            'material',
            'email',
            'city_id',
            'country_id',
            'mobile'
        ]);
        $createSponsorService->execute([
            'sponsor_data' => $sponsorData
        ]);

        return $this->successResponse([
            'redirect' => route('admin.sponsors.index')
        ],'Sponsor Created Successfully.',Response::HTTP_CREATED);
    }

    public function exportPdf(Request $request,ExportSponsorsPdfReportService $exportSponsorPdfReportService,FetchSponsorsListService $fetchSponsorListService)
    {
        $filterData = $request->only('name');
        $sponsors = $fetchSponsorListService->execute($filterData);
        return $exportSponsorPdfReportService->execute($sponsors);
    }

    public function exportExcel(Request $request,ExportSponsorsExcelReportService $exportSponsorExcelReportService,FetchSponsorsListService $fetchSponsorListService)
    {
        $filterData = $request->only('name');
        $sponsors = $fetchSponsorListService->execute($filterData);
        return $exportSponsorExcelReportService->execute($sponsors);
    }

    public function edit(Sponsor $sponsor)
    {
        return view('admin.sponsors.edit',compact('sponsor'));
    }

    public function update(SponsorRequest $request,Sponsor $sponsor,UpdateSponsorService $updateSponsorService)
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
        $updateSponsorService->execute([
            'user_data'         => $userData,
            'organization_data' => $organizationData,
            'sponsor' => $sponsor
        ]);

        return $this->successResponse([
            'redirect' => route('admin.sponsors.index')
        ],'Sponsor Updated Successfully.',Response::HTTP_ACCEPTED);
    }

    public function destroy(Sponsor $sponsor)
    {
        //todo authorize
        $sponsor->delete();
        return $this->successResponse([],'Sponsor Deleted Successfully.',Response::HTTP_ACCEPTED);
    }

    public function downloadMaterial(Sponsor $sponsor)
    {
        return Storage::download($sponsor->material,$sponsor->name.'.pdf');
    }
}
