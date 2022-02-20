<?php

namespace App\Services\Admin\Speaker;

use App\Services\Admin\Export\ExportExcelService;

class ExportSpeakersExcelReportService extends ExportExcelService
{
    function view()
    {
        return 'admin.speakers.report';
    }

    function fileName()
    {
        return 'speakers.xlsx';
    }
}
