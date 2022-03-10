<?php

namespace App\Services\Admin\Discount;

use App\Services\Admin\Export\ExportExcelService;

class ExportDiscountsExcelReportService extends ExportExcelService
{
    function view()
    {
        return 'admin.discounts.report';
    }

    function fileName()
    {
        return 'discounts.xlsx';
    }
}
