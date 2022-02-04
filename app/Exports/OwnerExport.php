<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class OwnerExport implements FromView
{
    private $owners;

    public function __construct($owners)
    {
        $this->owners = $owners;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->owners;
    }

    public function view(): View
    {
        return view('admin.owners.excel',[
            'owners' => $this->owners
        ]);
    }
}
