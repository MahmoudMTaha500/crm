<?php

namespace App\Exports;
use App\EnglishSchoolRequests;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class EnglishSchoolSpecificRequest implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $request;


    public function __construct($request)
    {
          $this->request = $request;
    }
    // public function collection()
    // {
    //     //
    // }
    public function view(): View
    {
        return view('admin.englishSchoolRequests.exports',
        [
          'englishSchoolRequests'=> EnglishSchoolRequests::whereIn('id',$this->request->requests_ids)->get()
        ]);
    }
}
