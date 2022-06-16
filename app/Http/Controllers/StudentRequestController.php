<?php

namespace App\Http\Controllers;

use App\StudentRequest;
use App\Student;
use App\SalesMan;
use App\Place_of_study;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StudentRequest\StudentRequests;
use App\Http\Requests\student\StudentsRequest;
use App\Http\Requests\StudentRequest\ExcelSheetRequest;
use Excel;
use App\Exports\StudentRequestExport;
use App\Exports\ExcelSheet;
use App\Country;
use App\Visa;
use App\User;
use App\Agency;
class StudentRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if($request->filter){
        //    dd($request->all());
        $country_id = $request->country_id;
        $city_id = $request->city_id;
        $salesMan = $request->salesMan;
        $fromDate = $request->from;
        $toDate = $request->to;
         $email = $request->email;
            $phone = $request->phone;
    
            $name = $request->name;
// dd($fromDate);

            $studentRequests = new StudentRequest;
            if($request->country_id){
                // $studentRequests=   $studentRequests->where('country_id',$request->country_id);
                $studentRequests=   $studentRequests->with('study_place')->whereHas('study_place', function ($query) use ($country_id)  {
                    $query->where('country_id',$country_id);
                } );
            }


            if($request->city_id){
            // $studentRequests->where('city_id',$request->city_id);
            $studentRequests = $studentRequests->with('study_place')->whereHas('study_place',function($query) use ($city_id){
              $query->where('city_id',$city_id);
            });

            }
            if($request->university){
                $studentRequests =  $studentRequests->where('study_place_id',"$request->university");
            }
            if($request->institute){
                $studentRequests =    $studentRequests->where('study_place_id',"$request->institute");
                } 
                if($request->status){
                    $studentRequests =    $studentRequests->where('status',"$request->status");
                    } 
                
                if($request->salesMan){
                    $studentRequests =      $studentRequests->where('salesman_id',$request->salesMan);
                    }

          if($fromDate){
            $studentRequests =      $studentRequests->where('created_at', '>=', "$fromDate" );
          }
          if($toDate){
            $studentRequests =      $studentRequests->where('created_at', '<=', "$toDate" );
          }

          if($request->email){
            $studentRequests = $studentRequests->with('student')->whereHas('student',function($query) use ($email) {
                $query->where('email',$email);
            });

        }


        if($request->phone){
             
        $studentRequests = $studentRequests->with('student')->whereHas('student',function($query) use ($phone){
            $query->where('phone',$phone);
        });

        }
      
      

        if($request->name){
        $studentRequests =    $studentRequests->with('student')->whereHas('student',function($query) use($name){
            $query->where('name','LIKE',"%{$name}%");

        });                
        } 

        if($request->employee){
        $studentRequests =    $studentRequests->where('creator',"$request->employee");

                     
        } 

            $studentRequests=   $studentRequests->with('study_place')->orderBy('id', 'DESC')->paginate(10);
           
            // dd( $studentRequests);


       } else{
        $studentRequests = StudentRequest::orderBy('id', 'DESC')->paginate(10);
     
    
       }
       $countries = Country::get();
       $SalesMens = SalesMan::get();
       $institutes = Place_of_study::where('type_id',1)->get();
       $universities = Place_of_study::where('type_id',2)->get();
       $employees = User::get();
       // dd($studentRequests);
       return view('admin.students_Requests.index',compact("studentRequests","countries",'institutes','universities','SalesMens','employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salsmens = SalesMan::get();
        $institutes = Place_of_study::where('type_id',1)->get();
        $universities = Place_of_study::where('type_id',2)->get();
        $agencies = Agency::get();
    return view('admin.students_Requests.create',compact("salsmens",'institutes','universities','agencies'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentsRequest $request)
    {
        // dd($request->all());
        $StudentController = new   StudentController();
        $StudentController->store( $request);
        
        $study_places =$request->study_place ;
        // dd(  $study_places  );
        foreach($study_places  as $study){

        StudentRequest::create([
            'student_id'=>$StudentController->student_id ,
            'study_place_id'=>$study ,
            'salesman_id'=>$request->salesman ,
            'status'=>$request->status ,
            'creator'=>auth()->user()->name,
        ]);
    }
  

      Alert::success('Add Opreation', 'Student   request Added Successflly  ');
      return redirect()->route('student-request.index');
    }
    

     public function All_Requests_In_Excel(){
        return Excel::download(new StudentRequestExport, 'StudentRequest.xlsx');
      
     }

public function Requests_In_Excel(ExcelSheetRequest $request){
    return Excel::download(new ExcelSheet($request), 'StudentRequest.xlsx');

    // dd($request->all());
}

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentRequest  $studentRequest
     * @return \Illuminate\Http\Response
     */
    public function show(StudentRequest $studentRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentRequest  $studentRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentRequest $studentRequest)
    {
        // dd($studentRequest);
        $salsmens = SalesMan::get();
        $institutes = Place_of_study::where('type_id',1)->get();
        $universities = Place_of_study::where('type_id',2)->get();

    return view('admin.students_Requests.edit',compact("salsmens",'institutes','universities','studentRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentRequest  $studentRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentRequest $studentRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentRequest  $studentRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentRequest $studentRequest)
    {
        $studentRequest->delete();
        Alert::error('Delete Opreation', 'Student   request Deleted Successflly  ');
        return redirect()->route('student-request.index');

    }
}
