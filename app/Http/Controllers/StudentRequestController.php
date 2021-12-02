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
use App\Http\Requests\StudentRequest\ExcelSheetRequest;
use Excel;
use App\Exports\StudentRequestExport;
use App\Exports\ExcelSheet;
use App\Country;
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

            $studentRequests=   $studentRequests->with('study_place')->paginate(10);
           
            // dd( $studentRequests);


       } else{
        $studentRequests = StudentRequest::paginate(10);
     
    
       }
       $countries = Country::get();
       $SalesMens = SalesMan::get();
       $institutes = Place_of_study::where('type_id',1)->get();
       $universities = Place_of_study::where('type_id',2)->get();
       // dd($studentRequests);
       return view('admin.students_requests.index',compact("studentRequests","countries",'institutes','universities','SalesMens'));
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

    return view('admin.students_requests.create',compact("salsmens",'institutes','universities'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequests $request)
    {
        // dd($request->all());
        $StudentController = new   StudentController();
        $StudentController->store($request);
        
        $study_places =$request->study_place ;
        // dd(   );
        foreach($study_places  as $study){

        StudentRequest::create([
            'student_id'=>$StudentController->student_id ,
            'study_place_id'=>$study ,
            'salesman_id'=>$request->salesman ,
            'status'=>$request->status ,
            'creator_id'=>1 ,
        ]);
    }

      Alert::success('Add Opreation', 'Student   request Added Successflly  ');
      return redirect()->route('student-request.index');
    }
    

     public function All_Requests_In_Excel(){
        return Excel::download(new StudentRequestExport, 'StudentRequest.xlsx');
        // $Requests_Data = StudentRequest::get();
        // // dd($Requests_Data);
        // $request_array[] = ['Name','Phone','E-mail','Address','Study Place','Study Place Type','Sales Men','Date'];
        // foreach($Requests_Data as $request){
        //     $request_array[] = [
        //         'Name'=>$request->student->name,
        //         'Phone'=>$request->student->phone,
        //         'E-mail'=>$request->student->email,
        //         'Address'=>$request->student->address,
        //         'Study Place'=>$request->study_place->name,
        //         'Study Place Type'=>$request->study_place->type->name,
        //         'Sales Men'=>$request->salesman->name,
        //         'Date'=>$request->created_at
        //     ];
 
  
        // }

        // Excel::store("Request Data", function($excel) use ($request_array){

        //  $excel->setTitle('Request Data');
        //  $excel->sheet("Request Data", function($sheet) use ($request_array) {
        //  $sheet->fromArray($request_array,null,'A1',false ,false);
        //  }) ;
        // })->download('xlsx');

//    return back();
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

    return view('admin.students_requests.edit',compact("salsmens",'institutes','universities','studentRequest'));
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
