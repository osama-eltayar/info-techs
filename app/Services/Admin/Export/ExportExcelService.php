<?php

namespace App\Services\Admin\Export;

use App\Exports\DataExport;
use Maatwebsite\Excel\Facades\Excel;

abstract class ExportExcelService
{
    public function execute($data)
    {
        return Excel::download(new DataExport($data,$this->view()), $this->fileName());
    }

    abstract function view();
    abstract function fileName();
}
