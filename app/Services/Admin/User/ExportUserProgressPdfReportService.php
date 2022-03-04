<?php

namespace App\Services\Admin\User;

use App\Services\Admin\Export\ExportPdfService;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportUserProgressPdfReportService extends ExportPdfService
{
    protected $view;

    function view()
    {
        return $this->view ?? 'admin.events.registered-users.progress-report';
    }

    function fileName()
    {
        return 'progress.pdf';
    }

    public function setView($view)
    {
        $this->view = $view;
        return $this;
    }
}
