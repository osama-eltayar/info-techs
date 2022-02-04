<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class DataExport implements FromView
{
    private $data;
    private $view;

    public function __construct($data,$view)
    {
        $this->data = $data;
        $this->view = $view;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->data;
    }

    public function view(): View
    {
        return view($this->view,[
            'data' => $this->data
        ]);
    }
}
