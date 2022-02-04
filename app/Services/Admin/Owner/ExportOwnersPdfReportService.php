<?php

namespace App\Services\Admin\Owner;
use App\Services\Admin\Export\ExportPdfService;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportOwnersPdfReportService extends ExportPdfService
{
    function view()
    {
        return 'admin.owners.report';
    }

    function fileName()
    {
        return 'owners.pdf';
    }
}
