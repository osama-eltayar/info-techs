<?php

namespace App\Services\Admin\Export;

use App\Exports\DataExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

abstract class ExportPdfService
{
    public function execute($data)
    {
        $pdf = PDF::loadView($this->view(), compact('data'));
        return $pdf->download($this->fileName());
    }

    abstract function view();
    abstract function fileName();
}
