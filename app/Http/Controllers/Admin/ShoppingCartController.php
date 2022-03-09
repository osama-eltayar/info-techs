<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\ShoppingCart;
use App\Services\Admin\ShoppingCart\ExportShoppingCartExcelReportService;
use App\Services\Admin\ShoppingCart\ExportShoppingCartPdfReportService;
use App\Services\Admin\ShoppingCart\FetchShoppingCartsListService;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    private static int $perPage = 10;

    /**
     * 
     */
    public function index(Request $request, FetchShoppingCartsListService $fetchShoppingCartService)
    {
        $filterData = $request->only(['number', 'name', 'course_name', 'paid_at', 'type']);
        $shoppingCarts = $fetchShoppingCartService->execute($filterData, self::$perPage);

        // get sum of transactions and courses
        $shoppingCartsCount = ShoppingCart::count();
        $shoppingCartsPricesSum = (float)ShoppingCart::sum('price');
        $coursesCount = Course::count();

        if ($request->ajax())
            return view('admin.shopping-carts.partials.shopping-carts-list', compact(
                'shoppingCarts',
                'shoppingCartsCount',
                'shoppingCartsPricesSum',
                'coursesCount'
            ));

        return view('admin.shopping-carts.index', compact(
            'shoppingCarts',
            'shoppingCartsCount',
            'shoppingCartsPricesSum',
            'coursesCount'
        ));
    }

    public function exportPdf(Request $request, ExportShoppingCartPdfReportService $exportShoppingCartPdfReportService, FetchShoppingCartsListService $fetchShoppingCartService)
    {
        $filterData = $request->only(['number', 'name', 'course_name', 'paid_at', 'type']);
        $shoppingCarts = $fetchShoppingCartService->execute($filterData);
        return $exportShoppingCartPdfReportService->execute($shoppingCarts);
    }

    public function exportExcel(Request $request, ExportShoppingCartExcelReportService $exportShoppingCartExcelReportService, FetchShoppingCartsListService $fetchShoppingCartService)
    {
        $filterData = $request->only(['number', 'name', 'course_name', 'paid_at', 'type']);
        $sponsors = $fetchShoppingCartService->execute($filterData);
        return $exportShoppingCartExcelReportService->execute($sponsors);
    }
}
