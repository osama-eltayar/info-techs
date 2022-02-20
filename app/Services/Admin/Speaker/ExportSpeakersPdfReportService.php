<?php

namespace App\Services\Admin\Speaker;
use App\Services\Admin\Export\ExportPdfService;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportSpeakersPdfReportService extends ExportPdfService
{
    function view()
    {
        return 'admin.speakers.report';
    }

    function fileName()
    {
        return 'speakers.pdf';
    }
}
