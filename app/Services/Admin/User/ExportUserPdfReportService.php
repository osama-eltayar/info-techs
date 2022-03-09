<?php

namespace App\Services\Admin\User;

use App\Services\Admin\Export\ExportPdfService;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportUserPdfReportService extends ExportPdfService
{
    protected $view;

    function view()
    {
        return $this->view ?? 'admin.users.report';
    }

    function fileName()
    {
        return 'users.pdf';
    }

    public function setView($view)
    {
        $this->view = $view;
        return $this;
    }
}
