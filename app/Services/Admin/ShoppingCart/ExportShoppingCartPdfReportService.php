<?php

namespace App\Services\Admin\ShoppingCart;

use App\Services\Admin\Export\ExportPdfService;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportShoppingCartPdfReportService extends ExportPdfService
{
    function view()
    {
        return 'admin.shopping-carts.report';
    }

    function fileName()
    {
        return 'shopping-carts.pdf';
    }
}
