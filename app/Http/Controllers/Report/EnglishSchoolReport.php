<?php

namespace App\Http\Controllers\Report;

use App\EnglishSchoolFinance;

class EnglishSchoolReport
{
public function GetReportEnglishSchool($request){
    $country_id = $request->country_id;
    $englishschool = $request->englishSchool;

    $salesMan = $request->salesMan;
    $markter = $request->markter;
    $employee = $request->employee;
    $start_date = $request->start_date;
    $name = $request->name;
    $remain = $request->remain;
    $status_followed = $request->status_followed;
    $status_paied = $request->status_paied;
    $month = $request->month;
    $year = $request->year;


    $EnglishSchoolFinance = new EnglishSchoolFinance;
    if($request->country_id){
        $EnglishSchoolFinance=   $EnglishSchoolFinance->with('request_institute.englishschool')->whereHas('request_institute.englishschool', function ($query) use ($country_id) {
            $query->where('country_id',$country_id);
        } );
    }
    if($englishschool){
        $EnglishSchoolFinance = $EnglishSchoolFinance->with('request_institute')->whereHas('request_institute',function($query) use ($englishschool){
            $query->where('request_id',$englishschool);
        });
    }

    if($request->salesMan){
        $EnglishSchoolFinance = $EnglishSchoolFinance->with('request_institute')->whereHas('request_institute',function($query) use ($salesMan){
            $query->where('salesman_id',$salesMan);

        });
    }
    if($markter){
        $EnglishSchoolFinance = $EnglishSchoolFinance->with('request_institute')->whereHas('request_institute',function($query) use ($markter){
            $query->where('markter_id',$markter);

        });
    }
    if($start_date){
        $EnglishSchoolFinance = $EnglishSchoolFinance->with('request_institute')->whereHas('request_institute',function($query) use ($start_date){
            $query->where('start_date',$start_date);

        });
    }

    if($employee){
        $EnglishSchoolFinance =      $EnglishSchoolFinance->where('creator', '=', "$employee" );
    }
    if($remain){
        $EnglishSchoolFinance =      $EnglishSchoolFinance->  where('commission_remain', '>', "$remain" );
    }

    if($request->name){
        $EnglishSchoolFinance =    $EnglishSchoolFinance->with('request_institute.student')->whereHas('request_institute.student',function($query) use($name){
            $query->where('name','LIKE',"%{$name}%");

        });
    }


    if($status_followed){
        $EnglishSchoolFinance =    $EnglishSchoolFinance->where('status_followed',$status_followed);
    }
    if($status_paied){
        $EnglishSchoolFinance =    $EnglishSchoolFinance->where('status_paied',$status_paied);
    }
    if($month){
        $EnglishSchoolFinance = $EnglishSchoolFinance->with('request_institute')->whereHas('request_institute',function($query) use ($month){
            $query->whereMonth('start_date',$month);

        });

    }
    if($year){
        $EnglishSchoolFinance = $EnglishSchoolFinance->with('request_institute')->whereHas('request_institute',function($query) use ($year){
            $query->whereYear('start_date',$year);

        });
    }
    $EnglishSchoolFinance =  $EnglishSchoolFinance->with('request_institute.student')->with('request_institute')->with('commissions')->orderBy('id', 'DESC')->paginate(10);


    return  $EnglishSchoolFinance ;

}
}
