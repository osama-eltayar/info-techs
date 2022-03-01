<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Discount;
use App\Services\Admin\Discount\ExportDiscountsExcelReportService;
use App\Services\Admin\Discount\ExportDiscountsPdfReportService;
use App\Services\Admin\Discount\FetchDiscountsListService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DiscountController extends Controller
{
    private static int $perPage = 10;

    /**
     * 
     */
    public function index(Request $request, FetchDiscountsListService $fetchDiscountListService)
    {
        $filterData = $request->only(['name','type','code','status','course']);
        $discounts = $fetchDiscountListService->execute($filterData, self::$perPage);
        //get courses 
        $courses=Course::all();

        if ($request->ajax())
                // dd($filterData);
            return view('admin.discounts.partials.discounts-list', compact(['discounts','courses']));

        return view('admin.discounts.index', compact(['discounts','courses']));
    }

    public function destroy(Discount $discount)
    {
        //todo authorize
        $discount->delete();
        return $this->successResponse([], 'Discount Deleted Successfully.', Response::HTTP_ACCEPTED);
    }

    public function exportPdf(Request $request, ExportDiscountsPdfReportService $exportDiscountsPdfReportService, FetchDiscountsListService $fetchDiscountListService)
    {
        $filterData = $request->only(['name','type','code','status','course']);
        $users = $fetchDiscountListService->execute($filterData);
        return $exportDiscountsPdfReportService->execute($users);
    }

    public function exportExcel(Request $request, ExportDiscountsExcelReportService $exportDiscountsExcelReportService, FetchDiscountsListService $fetchDiscountListService)
    {
        $filterData = $request->only(['name','type','code','status','course']);
        $sponsors = $fetchDiscountListService->execute($filterData);
        return $exportDiscountsExcelReportService->execute($sponsors);
    }
}
