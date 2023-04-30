<?php

namespace App\Http\Controllers\Report;
use App\financeUniversity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Student_media;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\student\StudentsRequest;
use App\Student;
use App\Country;
use App\Markter;
use App\SalesMan;
use App\University;
use App\Commission;
use App\User;
use App\Agency;
class ReportUniversity
{

    public  $financeUniversity;

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getFinanceUniversity()
    {
        return $this->financeUniversity;
    }

    /**
     * @param \Illuminate\Contracts\Pagination\LengthAwarePaginator $financeUniversity
     */
    public function setFinanceUniversity($financeUniversity): void
    {
        $this->financeUniversity = $financeUniversity;
    }

     function __construct( )
    {
//      $this->financeUniversity=      $this->GetReportsUniversity($request);

    }




    public function GetReportsUniversity($request){
//         dd($request->country_id);
        $country_id = $request->country_id;

        $university = $request->university;
        $agency = $request->agency;
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


        $financeUniversity = new financeUniversity;
        if($request->country_id){
            $financeUniversity=   $financeUniversity->with('request_uni.university')->whereHas('request_uni.university', function ($query) use ($country_id)  {
                $query->where('country_id',$country_id);
            } );
        }
        if($university){
            $financeUniversity = $financeUniversity->with('request_uni')->whereHas('request_uni',function($query) use ($university){
                $query->where('university_id',$university);
            });
        }
        if($agency){
            $financeUniversity = $financeUniversity->with('request_uni')->whereHas('request_uni',function($query) use ($agency){
                $query->where('agency_id',$agency);

            });
        }
        if($request->salesMan){
            $financeUniversity = $financeUniversity->with('request_uni')->whereHas('request_uni',function($query) use ($salesMan){
                $query->where('salesman_id',$salesMan);

            });
        }
        if($markter){
            $financeUniversity = $financeUniversity->with('request_uni')->whereHas('request_uni',function($query) use ($markter){
                $query->where('markter_id',$markter);

            });
        }
        if($start_date){
            $financeUniversity = $financeUniversity->with('request_uni')->whereHas('request_uni',function($query) use ($start_date){
                $query->where('start_date',$start_date);

            });
        }

        if($employee){
            $financeUniversity =      $financeUniversity->where('creator', '=', "$employee" );
        }
        if($remain){
            $financeUniversity =      $financeUniversity->  where('commission_remain', '>', "$remain" );
        }

        if($request->name){
            $financeUniversity =    $financeUniversity->with('request_uni.student')->whereHas('request_uni.student',function($query) use($name){
                $query->where('name','LIKE',"%{$name}%");

            });
        }


        if($status_followed){
            $financeUniversity =    $financeUniversity->where('status_followed',$status_followed);
        }
        if($status_paied){
            $financeUniversity =    $financeUniversity->where('status_paied',$status_paied);
        }
        if($month){
            $financeUniversity = $financeUniversity->with('request_uni')->whereHas('request_uni',function($query) use ($month){
                $query->whereMonth('start_date',$month);

            });

        }
        if($year){
            $financeUniversity = $financeUniversity->with('request_uni')->whereHas('request_uni',function($query) use ($year){
                $query->whereYear('start_date',$year);

            });
        }

        $financeUniversity=  $financeUniversity->with('request_uni.student')->with('request_uni')->with('commissions')->orderBy('id', 'DESC')->paginate(10);
       $this->financeUniversity= $financeUniversity;
        return  $financeUniversity;
    }
}
