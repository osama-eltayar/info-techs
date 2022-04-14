<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class SurveyAnswersExport implements FromView
{
    private $answers;

    public function __construct($answers)
    {
        $this->answers = $answers;
    }


    public function view(): View
    {
        return view('admin.surveys.answers.excel',[
            'answers' => $this->answers
        ]);
    }
}
