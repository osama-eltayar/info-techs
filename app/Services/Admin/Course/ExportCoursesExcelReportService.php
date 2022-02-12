<?php

namespace App\Services\Admin\Course;

use App\Services\Admin\Export\ExportExcelService;

class ExportCoursesExcelReportService extends ExportExcelService
{
    private $view;

    public function view()
    {
        return $this->view;
    }

    public function fileName()
    {
        return 'events.xlsx';
    }

    public function setView($view)
    {
        $this->view = $view;
        return $this;
    }

}
