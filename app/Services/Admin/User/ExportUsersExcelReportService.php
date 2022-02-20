<?php

namespace App\Services\Admin\User;

use App\Services\Admin\Export\ExportExcelService;

class ExportUsersExcelReportService extends ExportExcelService
{
    function view()
    {
        return 'admin.users.report';
    }

    function fileName()
    {
        return 'users.xlsx';
    }
}
