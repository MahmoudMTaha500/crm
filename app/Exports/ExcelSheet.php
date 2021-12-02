<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\StudentRequest;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


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
        return view('admin.students_Requests.exports', [
            'studentRequests' => StudentRequest::whereIn('id',$this->request->ids)->get()
        ]);
    }
}
