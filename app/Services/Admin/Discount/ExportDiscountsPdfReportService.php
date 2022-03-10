<?php

namespace App\Services\Admin\Discount;

use App\Services\Admin\Export\ExportPdfService;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportDiscountsPdfReportService extends ExportPdfService
{
    function view()
    {
        return 'admin.discounts.report';
    }

    function fileName()
    {
        return 'discounts.pdf';
    }
}
