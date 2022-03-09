<?php

namespace App\Services\Admin\User;

use App\Services\Admin\Export\ExportExcelService;

class ExportUsersExcelReportService extends ExportExcelService
{
    protected $view;

    function view()
    {
        return $this->view ?? 'admin.users.report';
    }

    function fileName()
    {
        return 'users.xlsx';
    }

    public function setView($view)
    {
        $this->view = $view;
        return $this;
    }
}
