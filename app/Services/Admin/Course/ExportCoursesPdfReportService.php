<?php

namespace App\Services\Admin\Course;
use App\Services\Admin\Export\ExportPdfService;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportCoursesPdfReportService extends ExportPdfService
{
    function view()
    {
        return 'admin.courses.report';
    }

    function fileName()
    {
        return 'events.pdf';
    }
}
