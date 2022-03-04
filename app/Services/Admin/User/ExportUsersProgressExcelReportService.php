<?php

namespace App\Services\Admin\User;

use App\Services\Admin\Export\ExportExcelService;

class ExportUsersProgressExcelReportService extends ExportExcelService
{
    protected $view;

    function view()
    {
        return $this->view ?? 'admin.events.registered-users.progress-report';
    }

    function fileName()
    {
        return 'progress.xlsx';
    }

    public function setView($view)
    {
        $this->view = $view;
        return $this;
    }
}
