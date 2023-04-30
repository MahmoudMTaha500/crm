<?php

namespace App\Exports;

use App\StudentRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentRequestExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return StudentRequest::all();
    // }

    public function view(): View
    {
        return view('admin.students_Requests.exports', [
            'studentRequests' => StudentRequest::all()
        ]);
    }


    

}
