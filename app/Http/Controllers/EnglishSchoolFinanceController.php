<?php

namespace App\Http\Controllers;

use App\EnglishSchoolFinance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Student_media;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\student\StudentsRequest;
use App\Student;
use App\Country;
use App\Markter;
use App\SalesMan;
use App\EnglishSchool;
use App\Commission;
use App\User;
class EnglishSchoolFinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        $this->CanDoAction('admin','show-finance');

        if($request->filter){
            //    dd($request->all());
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

//dd($request->all());
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
           } else{
            $EnglishSchoolFinance = EnglishSchoolFinance::with('request_institute.student')->with('request_institute')->with('commissions')->orderBy('id', 'DESC')->paginate(10);


           }


        // $EnglishSchoolFinance = EnglishSchoolFinance::with('request_institute.student')->with('request_institute.EnglishSchoolReport')->orderBy('id', 'DESC')->paginate(10);

        $students =Student::get();


        $markters = Markter::get();

        $countries = Country::get();
        $SalesMens = SalesMan::get();
        $EnglishSchools = EnglishSchool::get();
        $employees = User::get();
            return view('admin.finance_institute.index' ,compact('EnglishSchoolFinance','students','countries','EnglishSchools','SalesMens','markters','employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EnglishSchoolFinance  $englishSchoolFinance
     * @return \Illuminate\Http\Response
     */
    public function show(EnglishSchoolFinance $englishSchoolFinance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EnglishSchoolFinance  $englishSchoolFinance
     * @return \Illuminate\Http\Response
     */
    public function edit(EnglishSchoolFinance $englishSchoolFinance,$id)
    {
        $this->CanDoAction('admin','edit-finance');
      $englishSchoolFinance = EnglishSchoolFinance::find($id);
    //   dd($englishSchoolFinance);

      $commissions = Commission::where('finance_english_school_id',$englishSchoolFinance->id)->get();

      $student_media = Student_media::where('student_id',$englishSchoolFinance->student_id)->get();

      $students =Student::get();

      $EnglishSchools = EnglishSchool::get();
      return view('admin.finance_institute.edit',compact('englishSchoolFinance','student_media','students','commissions','EnglishSchools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EnglishSchoolFinance  $englishSchoolFinance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EnglishSchoolFinance $englishSchoolFinance,$id)
    {
        // dd($request->all());

        $englishSchoolFinance = EnglishSchoolFinance::find($id);
        $englishSchoolFinance->total = $request->total;
        $englishSchoolFinance->pay = $request->paied;
        $englishSchoolFinance->remain = $request->remain;

        $englishSchoolFinance->commission_percentage = $request->commission_percentage;

        $englishSchoolFinance->commission_percentage = $request->commission_percentage;
        $englishSchoolFinance->commission_total = $request->commission_total;
        $englishSchoolFinance->commission_received = $request->commission_received;
        $englishSchoolFinance->commission_remain = $request->commission_remain;

        $englishSchoolFinance->status_paied = $request->status_paied;
        $englishSchoolFinance->status_followed = $request->status_followed;

        $englishSchoolFinance->student_period = $request->student_period;
        $englishSchoolFinance->english_school_note = $request->english_school_note;
        $englishSchoolFinance->sat_note = $request->sat_note;
        $englishSchoolFinance->creator =   auth()->user()->name;
        $englishSchoolFinance->save();
        $counter = count($request->commission);
        $commissions = Commission::where('finance_english_school_id',$englishSchoolFinance->id)->delete();
        for($x=0;  $x < $counter; $x++){

            Commission::create([
                'finance_english_school_id'=>$englishSchoolFinance->id,
                'commission'=>$request->commission[$x],
                'commission_date'=>$request->commission_date[$x],
                'study_period'=> $request->studyperiod[$x],


            ]);
        }
        Alert::success('Update  Opration','Finance English School  Updated Succssfully');
        return redirect()->route('finance-english-school.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EnglishSchoolFinance  $englishSchoolFinance
     * @return \Illuminate\Http\Response
     */
    public function destroy(EnglishSchoolFinance $englishSchoolFinance)
    {
        $this->CanDoAction('admin','delete-finance');

    }
}
