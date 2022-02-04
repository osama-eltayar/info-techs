<?php

namespace App\Services\Admin\Owner;

use App\Services\Admin\Export\ExportExcelService;

class ExportOwnersExcelReportService extends ExportExcelService
{
    function view()
    {
        return 'admin.owners.report';
    }

    function fileName()
    {
        return 'owners.xlsx';
    }
}
