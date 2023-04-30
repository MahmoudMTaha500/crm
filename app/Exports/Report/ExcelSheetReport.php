<?php

namespace App\Exports\Report;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\EnglishSchoolRequests;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class ExcelSheetReport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $request;


    public function __construct($request)
    {
        $this->request = $request;
    }
    public function collection()
    {
        //
    }

    public function view(): View
    {
        return view('admin.report.university.exports',
            [
                'financeUniversity'=>$this->request
            ]);
    }
}
