<?php

namespace App\Exports;
use App\universityRequests;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UniversityRequestExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
       
    // }
    public function view(): View
    {
        return view('admin.universityRequests.exports', [
            'universityRequests' => universityRequests::all()
        ]);
    }

}
