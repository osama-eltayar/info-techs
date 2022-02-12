<?php

namespace App\Services\Admin\Course;
use App\Services\Admin\Export\ExportPdfService;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportCoursesPdfReportService extends ExportPdfService
{
    private $view;

    function view()
    {
        return $this->view;
    }

    function fileName()
    {
        return 'events.pdf';
    }

    public function setView($view)
    {
        $this->view = $view;
        return $this;
    }
}
