<?php

namespace App\Services\Admin\Sponsor;

use App\Services\Admin\Export\ExportExcelService;

class ExportSponsorsExcelReportService extends ExportExcelService
{
    function view()
    {
        return 'admin.sponsors.report';
    }

    function fileName()
    {
        return 'sponsors.xlsx';
    }
}
