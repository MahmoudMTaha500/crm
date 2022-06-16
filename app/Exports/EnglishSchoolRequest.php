<?php

namespace App\Exports;
use App\EnglishSchoolRequests;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class EnglishSchoolRequest implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }
    public function view(): View
    {
return view('admin.englishSchoolRequests.exports',
    [
      'englishSchoolRequests'=> EnglishSchoolRequests::all()
    ]);
    }
}



