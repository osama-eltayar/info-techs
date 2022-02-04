<?php

namespace App\Services\Admin\Course;

use App\Services\Admin\Export\ExportExcelService;

class ExportCoursesExcelReportService extends ExportExcelService
{
    function view()
    {
        return 'admin.courses.report';
    }

    function fileName()
    {
        return 'events.xlsx';
    }
}
