<?php

namespace App\Services\Admin\Sponsor;
use App\Services\Admin\Export\ExportPdfService;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportSponsorsPdfReportService extends ExportPdfService
{
    function view()
    {
        return 'admin.sponsors.report';
    }

    function fileName()
    {
        return 'sponsors.pdf';
    }
}
