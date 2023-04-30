<?php

namespace App\Exports\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\EnglishSchoolRequests;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExcelSheetEnglishSchoolReport implements FromView
{


    public $request;


    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }

    public function view(): View
    {
        return view('admin.report.englishschool.exports',
            [
                'financeenglishschool'=>$this->request
            ]);
    }


}
