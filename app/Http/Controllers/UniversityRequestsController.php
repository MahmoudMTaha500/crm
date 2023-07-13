<?php

namespace App\Http\Controllers;


use App\universityRequests;
use Illuminate\Http\Request;
use App\University;
use App\Country;
use App\Agency;
use App\University_Agencies;
use Alert;
use App\SalesMan;
use App\User;
use App\Student;
use App\Student_media;
use App\Http\Requests\university\UniversityRequest;
use App\Http\Requests\StudentRequest\ExcelSheetRequest;
use Excel;
use App\Exports\UniversityRequestExport;
use App\Exports\ExcelSheet;
use App\Markter;
use App\Visa;
use App\financeUniversity;
use App\Http\Controllers\PerformanceController;
class UniversityRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->CanDoAction('admin', 'show-requestuniversity');

       if($request->filter){
        //    dd($request->all());
        $country_id = $request->country_id;
        $city_id = $request->city_id;
        $university = $request->university;
        $agency = $request->agency;
        $kind_of_course = $request->kind_of_course;
        $salesMan = $request->salesMan;
        $start_date = $request->start_date;

         $email = $request->email;
            $phone = $request->phone;
            $name = $request->name;
// dd($fromDate);

            $universityRequestss = new universityRequests;
            if($request->country_id){
                // $universityRequestss=   $universityRequestss->where('country_id',$request->country_id);
                $universityRequestss=   $universityRequestss->with('university')->whereHas('university', function ($query) use ($country_id)  {
                    $query->where('country_id',$country_id);
                } );
            }


            if($request->city_id){
            // $universityRequestss->where('city_id',$request->city_id);
            $universityRequestss = $universityRequestss->with('university')->whereHas('university',function($query) use ($city_id){
              $query->where('city_id',$city_id);
            });

            }
            if($request->university){
                $universityRequestss =  $universityRequestss->where('university_id',"$request->university");
            }
            if($agency){
                $universityRequestss =  $universityRequestss->where('agency_id',"$agency");
            }

                if($request->status){
                    $universityRequestss =    $universityRequestss->where('status',"$request->status");
                    }

                if($request->salesMan){
                    $universityRequestss =      $universityRequestss->where('salesman_id',$request->salesMan);
                    }

          if($start_date){
            $universityRequestss =      $universityRequestss->where('start_date', '=', "$start_date" );
          }
          if($kind_of_course){
            $universityRequestss =      $universityRequestss->where('kind_of_course', '=', "$kind_of_course" );
          }


          if($request->email){
            $universityRequestss = $universityRequestss->with('student')->whereHas('student',function($query) use ($email) {
                $query->where('email',$email);
            });

        }


        if($request->phone){

        $universityRequestss = $universityRequestss->with('student')->whereHas('student',function($query) use ($phone){
            $query->where('phone',$phone);
        });

        }



        if($request->name){
        $universityRequestss =    $universityRequestss->with('student')->whereHas('student',function($query) use($name){
            $query->where('name','LIKE',"%{$name}%");

        });
        }

        if($request->employee){
        $universityRequestss =    $universityRequestss->where('creator',"$request->employee");


        }
        if($request->markter){
        $universityRequestss =    $universityRequestss->where('markter_id',$request->markter);


        }

            $universityRequestss=   $universityRequestss->with('university')->orderBy('id', 'DESC')->paginate(10);

            // dd( $universityRequestss);


       } else{
        $universityRequestss = universityRequests::orderBy('id', 'DESC')->paginate(10);


       }
       $markters = Markter::get();

       $countries = Country::get();
       $SalesMens = SalesMan::get();
       $universities = University::get();
       $employees = User::get();
// $useVue=true;

       // dd($universityRequestss);
       return view('admin.universityRequests.index',compact("universityRequestss","countries",'universities','SalesMens','employees','markters'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->CanDoAction('admin', 'create-requestuniversity');

        $salsmens = SalesMan::get();
        $universities = University::get();

        $agencies = Agency::get();
       $students = Student::get();
       $markters = Markter::get();
$useVue=true;
    return view('admin.universityRequests.create',compact("salsmens",'universities','agencies','students','useVue','markters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UniversityRequest $request)
    {
//dd($request->all());
         $counter = count($request->count);
        for($x=0;  $x < $counter; $x++){
           $uni_request=   universityRequests::create([
                'student_id'=>$request->student,
                'university_id'=>$request->uni_val[$x] ,
                'agency_id'=>$request->agency_val[$x] ,
                'salesman_id'=>$request->salesman ,
                'markter_id'=>$request->markter ,
                'status'=>$request->status[$x] ,
                'text_note'=>$request->note_course[$x] ,
                'start_date'=>$request->start_date[$x] ,
                'fees'=>$request->fees[$x] ,
                'kind_of_course'=>$request->kind_of_course[$x] ,
                'creator'=>auth()->user()->name,
            ]);

            if($request->status[$x] =="Confirmed / CAS"){
                $request->validate([
                    'fees'=>'required'
                ]);
                financeUniversity::create([
                    "request_id" =>$uni_request->id,
                    "total" => $request->fees[$x],
                    "pay" => 0,
                    "remain" => $request->fees[$x],
                    "status_paied" => 'panding',
                    "status_followed" => 'not follow',
                    'creator'=>auth()->user()->name,
                ]);
                $user_id = auth()->user()->id;
                $key=$request->kind_of_course[$x];
                $salesman = $request->salesman;
                $employeeBonus  = new PerformanceController();
                 $employeeBonus->AddBounces($user_id,$key,$uni_request->id,'university');
                $employeeBonus->AddBounces($salesman,$key,$uni_request->id,'university');
            }

            if($request->to_visa){

              $country =University::where('id',$request->uni_val[$x])->get();
            //   dd( $country[0]->country_id);

                Visa::create([
                    'student_id'=>$request->student ,
                    'date'=>0,
                    'type_id'=>0 ,
                    'salesman_id'=>$request->salesman ,
                    'fees'=>0 ,
                    'country_id'=>$country[0]->country_id,
                    'bank_id'=>0 ,
                    'transfer_bank_id'=>0 ,
                    "other" => '---',
                    "payment" => '---',
                    "status" => "New",
                    'creator'=>auth()->user()->name,
                ]);
            }
        }
        if($request->file){

            for($x=0;  $x < count($request->name_of_file)   ;$x++)
            {
                  $media_name=$request->name_of_file[$x];
                  $objfile =$request->file[$x];
                  $fileName = time() . $objfile->getClientOriginalName();
                  $pathFile = public_path("storage/studentsMedia");
                  $objfile->move($pathFile, $fileName);
                  $fileNamePath = "storage/studentsMedia" . '/' . $fileName;
                  Student_media::create([
                      'student_id'=> $request->student,
                      'media_name'=>$media_name,
                      'media_path'=> $fileNamePath,
                  ]);

            }

    }
    Alert::success('Add  Opration','Student Request University  Added Succssfully');
    return redirect()->route('university-request.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\universityRequests  $universityRequests
     * @return \Illuminate\Http\Response
     */
    public function show(universityRequests $universityRequests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\universityRequests  $universityRequests
     * @return \Illuminate\Http\Response
     */
    public function edit(universityRequests $universityRequests,Request $request,$id)
    {
        $this->CanDoAction('admin', 'edit-requestuniversity');

        $universityRequests= universityRequests::find($id);
        $salsmens = SalesMan::get();
        $universities = University::get();
        $student_media = Student_media::where('student_id',$universityRequests->student_id)->get();
        $agencies = Agency::get();
       $students = Student::get();
       $markters = Markter::get();

    return view('admin.universityRequests.edit',compact("salsmens",'universities','agencies','students','universityRequests','student_media','markters'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\universityRequests  $universityRequests
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, universityRequests $universityRequests,$id)
    {

        $universityRequests= universityRequests::find($id);


        $universityRequests->university_id=$request->uni;
        $universityRequests->agency_id=$request->agency;
        $universityRequests->salesman_id=$request->salesman;
        $universityRequests->markter_id=$request->markter;
        $universityRequests->start_date=$request->start_date;
        $universityRequests->text_note=$request->note_course;
        $universityRequests->status=$request->status;
        $universityRequests->fees=$request->fees;
        $universityRequests->kind_of_course=$request->kind_of_course;
        $universityRequests->manual_id=$request->manual_id;
        $universityRequests->save();

        if($request->file){

            for($x=0;  $x < count($request->name_of_file)   ;$x++)
            {
                  $media_name=$request->name_of_file[$x];
                  $objfile =$request->file[$x];
                  $fileName = time() . $objfile->getClientOriginalName();
                  $pathFile = public_path("storage/studentsMedia");
                  $objfile->move($pathFile, $fileName);
                  $fileNamePath = "storage/studentsMedia" . '/' . $fileName;
                  Student_media::create([
                      'student_id'=> $universityRequests->student_id,
                      'media_name'=>$media_name,
                      'media_path'=> $fileNamePath,
                  ]);

            }

    }

        $employeeBonusCheck  = new PerformanceController();


    if($request->status =="Confirmed / CAS"){
        $request->validate([
            'fees'=>'required'
        ]);
        $user_id = auth()->user()->id;
        $key=$request->kind_of_course;
        $salesman = $request->salesman;
        $employeeBonusCheck->AddBounces($user_id,$key,$id,'university');;
        $employeeBonusCheck->AddBounces($salesman,$key,$id,'university');;

        financeUniversity::create([
            "request_id" =>$universityRequests->id,
            "total" => $request->fees,
            "pay" => 0,
            "remain" => $request->fees,
            "status_paied" => 'panding',
            "status_followed" => 'not follow',

            'creator'=>auth()->user()->name,



        ]);
    } else
    {
        financeUniversity::where('request_id',$id)->delete();

        $employeeBonusCheck->CheckTheBouncesIsValid( $id ,'university');
    }

    Alert::success('Update  Opration','Student Request University  Updated Succssfully');
    return redirect()->route('university-request.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\universityRequests  $universityRequests
     * @return \Illuminate\Http\Response
     */
    public function destroy(universityRequests $universityRequests)
    {
        $this->CanDoAction('admin', 'delete-requestuniversity');

    }


    public function getUni(){
        $universities = University::get(['id','name']);


        return response()->json($universities);

    }
    public function getAgency(){
        $agencies = Agency::get(['id','name']);


        return response()->json($agencies);

    }
    public function getstudents(){
        $students = Student::get(['id','name']);


        return response()->json($students);

    }
    public function getagencyUni(Request $request){
        // return dd($request->uni_id);
        $agency_ids=[];
        $agencies_uni = University_Agencies::where('university_id',$request->uni_id)->get("agency_id");
        foreach($agencies_uni  as $agency){
            // $agency_ids[] +=$agency->agency_id;
            $agency_ids[] = Agency:: where('id',$agency->agency_id)->get(['id','name'])[0];
        }


        if($request->typeArray){

            $html_agency=' <option value=""> Chosse Agency </option>';
            foreach($agency_ids as $agency){
                $html_agency .= "
               <option value="."$agency->id".">$agency->name"." </option>";
            }
            return response()->json( ['html_agency'=>$html_agency]);
        }else{
            return response()->json($agency_ids);

        }

    }

    public function All_Requests_In_Excel(){
        return Excel::download(new UniversityRequestExport, 'UniversitiesRequests.xlsx');

     }

public function Requests_In_Excel(ExcelSheetRequest $request){
    // dd($request->requests_ids);
    return Excel::download(new ExcelSheet($request), 'UniversitiesRequests.xlsx');

    // dd($request->all());
}
}
