<?php

namespace App\Http\Controllers\Admin;

use App\Services\Admin\Discount\ExportDiscountsExcelReportService;
use App\Services\Admin\Discount\ExportDiscountsPdfReportService;
use App\Services\Admin\Discount\FetchDiscountsListService;
use Illuminate\Http\Request;
use App\Enums\DiscountAmountTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiscountRequest;
use App\Models\Course;
use App\Models\Discount;
use App\Models\Speciality;
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

    public function create()
    {
        $discountAmountTypes = DiscountAmountTypeEnum::MAPPED_TYPES;
        $discountTypes       = ['Individual' => Discount::INDIVIDUAL, 'General' => Discount::GENERAL];
        $courses             = Course::all();
        $specialities        = Speciality::all();
        return view('admin.discounts.create', compact('discountTypes', 'discountAmountTypes', 'courses', 'specialities'));
    }

    public function store(DiscountRequest $request)
    {
        $data = $request->validated();
        $data['valid_generation_number'] = $request->input('generation_number');
        $discount = Discount::create($data);
        $discount->specialities()->attach($request->specialities);
        return $this->successResponse([
            'redirect' => route('admin.discounts.index')
        ], 'Discount Created Successfully.', Response::HTTP_CREATED);
    }

    public function edit(Discount $discount)
    {
        $discountAmountTypes = DiscountAmountTypeEnum::MAPPED_TYPES;
        $discountTypes       = ['Individual' => Discount::INDIVIDUAL, 'General' => Discount::GENERAL];
        $courses             = Course::all();
        $specialities        = Speciality::all();
        $discount->load('specialities');
        return view('admin.discounts.edit', compact('discountTypes', 'discountAmountTypes', 'courses', 'specialities','discount'));
    }

    public function update(DiscountRequest $request,Discount $discount)
    {
        $discount->update($request->validated());
        $discount->specialities()->sync($request->specialities);
        return $this->successResponse([
            'redirect' => route('admin.discounts.index')
        ], 'Discount Created Successfully.', Response::HTTP_CREATED);
    }
}
