<?php

namespace App\Services\Admin\ShoppingCart;

use App\Services\Admin\Export\ExportExcelService;

class ExportShoppingCartExcelReportService extends ExportExcelService
{
    function view()
    {
        return 'admin.shopping-carts.report';
    }

    function fileName()
    {
        return 'shopping-carts.xlsx';
    }
}
