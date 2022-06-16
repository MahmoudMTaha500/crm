<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\StudentRequest;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\universityRequests;


class ExcelSheet implements FromView
{
    /**
     * 
     * 
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     //
    // }

 public $request;


    public function __construct($request)
    {
          $this->request = $request;
    }


    public function view(): View
    {
        // dd($this->request->ids);
        // dd(StudentRequest::whereIn('id',$this->request->ids)->get());
        return view('admin.universityRequests.exports', [
            'universityRequests' => universityRequests::whereIn('id',$this->request->requests_ids)->get()
        ]);
    }
}
