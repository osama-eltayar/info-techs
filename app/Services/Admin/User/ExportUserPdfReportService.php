<?php

namespace App\Services\Admin\User;

use App\Services\Admin\Export\ExportPdfService;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportUserPdfReportService extends ExportPdfService
{
    function view()
    {
        return 'admin.users.report';
    }

    function fileName()
    {
        return 'users.pdf';
    }
}
