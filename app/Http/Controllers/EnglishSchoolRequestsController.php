<?php

namespace App\Http\Controllers;

use App\EnglishSchoolRequests;
use Illuminate\Http\Request;
use App\EnglishSchool;
use App\SalesMan;
use App\Agency;
use App\Student;
use App\Markter;
use App\Http\Requests\englishschool\EcnglishSchoolRequest;
use App\Student_media;
use App\Country;
use App\User;
use  Alert;
use App\Exports\ExcelSheet;
use App\Visa;
use App\EnglishSchoolFinance;
use App\Exports\EnglishSchoolRequest;
use App\Exports\EnglishSchoolSpecificRequest;
use App\Http\Requests\StudentRequest\ExcelSheetRequest;
use Excel;



class EnglishSchoolRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->CanDoAction('admin', 'show-request-english-school');

        if ($request->filter) {
            $country_id = $request->country_id;
            $city_id = $request->city_id;
            $englishSchool = $request->englishSchool;
            $course = $request->course;
            $salesMan = $request->salesMan;
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $duration = $request->duration;
            $email = $request->email;
            $phone = $request->phone;
            $name = $request->name;
            $EnglishSchoolRequests = new EnglishSchoolRequests;
            if ($request->country_id) {
                $EnglishSchoolRequests = $EnglishSchoolRequests->with('englishschool')->whereHas('englishschool', function ($query) use ($country_id) {
                    $query->where('country_id', $country_id);
                });
            }
            if ($request->city_id) {
                $EnglishSchoolRequests = $EnglishSchoolRequests->with('englishschool')->whereHas('englishschool', function ($query) use ($city_id) {
                    $query->where('city_id', $city_id);
                });
            }
            if ($request->englishSchool) {
                $EnglishSchoolRequests = $EnglishSchoolRequests->where('englishschool_id', "$request->englishSchool");
            }
            if ($request->status) {
                $EnglishSchoolRequests = $EnglishSchoolRequests->where('status', "$request->status");
            }
            if ($request->salesMan) {
                $EnglishSchoolRequests = $EnglishSchoolRequests->where('salesman_id', $request->salesMan);
            }
            if ($start_date) {
                $EnglishSchoolRequests = $EnglishSchoolRequests->where('start_date', '=', "$start_date");
            }
            if ($course) {
                $EnglishSchoolRequests = $EnglishSchoolRequests->where('course', '=', "$course");
            }
            if ($request->email) {
                $EnglishSchoolRequests = $EnglishSchoolRequests->with('student')->whereHas('student', function ($query) use ($email) {
                    $query->where('email', $email);
                });
            }
            if ($request->phone) {
                $EnglishSchoolRequests = $EnglishSchoolRequests->with('student')->whereHas('student', function ($query) use ($phone) {
                    $query->where('phone', $phone);
                });
            }
            if ($request->name) {
                $EnglishSchoolRequests = $EnglishSchoolRequests->with('student')->whereHas('student', function ($query) use ($name) {
                    $query->where('name', 'LIKE', "%{$name}%");
                });
            }
            if ($request->employee) {
                $EnglishSchoolRequests = $EnglishSchoolRequests->where('creator', "$request->employee");
            }
            if ($request->markter) {
                $EnglishSchoolRequests = $EnglishSchoolRequests->where('markter_id', $request->markter);
            }
            $EnglishSchoolRequests = $EnglishSchoolRequests->with('englishschool')->orderBy('id', 'DESC')->paginate(10);
        } else {
            $EnglishSchoolRequests = EnglishSchoolRequests::orderBy('id', 'DESC')->paginate(10);
        }
        $markters = Markter::get();
        $countries = Country::get();
        $SalesMens = SalesMan::get();
        $englishSchools = EnglishSchool::get();
        $employees = User::get();
       return view('admin.englishSchoolRequests.index',compact("EnglishSchoolRequests",'englishSchools',"countries",'SalesMens','employees','markters'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->CanDoAction('admin', 'create-request-english-school');
        $salsmens = SalesMan::get();
        $EnglishSchools = EnglishSchool::get();
        $agencies = Agency::get();
        $students = Student::get();
        $markters = Markter::get();
        $useVue = true;
        return view('admin.englishSchoolRequests.create',compact("salsmens",'EnglishSchools','agencies','students','useVue','markters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EcnglishSchoolRequest $request)
    {
        $counter = count($request->count);
        for($x=0;  $x < $counter; $x++){
        if($request->status[$x] =="Confirmed / CAS"){
            $request->validate([
                'fees'=>'required'
            ]);
        }


       $englishSchool_id=  EnglishSchoolRequests::create([
                'student_id'=>$request->student,
                'englishSchool_id'=>$request->englishschool[$x] ,
                'salesman_id'=>$request->salesman ,
                'markter_id'=>$request->markter ,
                'status'=>$request->status[$x] ,
                'text_note'=>$request->note_course[$x] ,
                'start_date'=>$request->start_date[$x] ,
                'end_date'=>$request->end_date[$x] ,
                'fees'=>$request->fees[$x] ,
                'course'=>$request->course[$x] ,
                'duration'=>$request->duration[$x] ,
                'residence'=>$request->Residence[$x] ,
                'creator'=>auth()->user()->name,
            ]);
            if($request->status[$x] =="Confirmed / CAS"){
                $request->validate([
                    'fees'=>'required'
                ]);

                EnglishSchoolFinance::create([
                    "request_id" =>$englishSchool_id->id,
                    "total" => $request->fees[$x],
                    "pay" => 0,
                    "remain" => $request->fees[$x],
                    "status_paied" => 'panding',
                    "status_followed" => 'not follow',

                    'creator'=>auth()->user()->name,



                ]);

            }

            if($request->to_visa){

                $country =EnglishSchool::where('id',$request->englishschool[$x])->get();
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
    return redirect()->route('english-school-request.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EnglishSchoolRequests  $englishSchoolRequests
     * @return \Illuminate\Http\Response
     */
    public function show(EnglishSchoolRequests $englishSchoolRequests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EnglishSchoolRequests  $englishSchoolRequests
     * @return \Illuminate\Http\Response
     */
    public function edit(EnglishSchoolRequests $englishSchoolRequests,$id)
    {
        $this->CanDoAction('admin', 'edit-request-english-school');

        $englishSchoolRequests= EnglishSchoolRequests::find($id);
        $salsmens = SalesMan::get();
        $EnglishSchools = EnglishSchool::get();
        $student_media = Student_media::where('student_id',$englishSchoolRequests->student_id)->get();
        $agencies = Agency::get();
       $students = Student::get();
       $markters = Markter::get();

    return view('admin.englishSchoolRequests.edit',compact("salsmens",'EnglishSchools','agencies','students','englishSchoolRequests','student_media','markters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EnglishSchoolRequests  $englishSchoolRequests
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EnglishSchoolRequests $englishSchoolRequests,$id)
    {
        // dd($request->all());

        $EnglishSchoolRequests= EnglishSchoolRequests::find($id);


        $EnglishSchoolRequests->englishSchool_id=$request->englishschool;
        $EnglishSchoolRequests->salesman_id=$request->salesman;
        $EnglishSchoolRequests->markter_id=$request->markter;
        $EnglishSchoolRequests->start_date=$request->start_date;
        $EnglishSchoolRequests->end_date=$request->end_date;
        $EnglishSchoolRequests->duration=$request->duration;
        $EnglishSchoolRequests->text_note=$request->note_course;
        $EnglishSchoolRequests->status=$request->status;
        $EnglishSchoolRequests->fees=$request->fees;
        $EnglishSchoolRequests->course=$request->course;
        $EnglishSchoolRequests->save();
        if($request->status =="Confirmed / CAS"){
            $request->validate([
                'fees'=>'required'
            ]);

            EnglishSchoolFinance::create([
                "request_id" =>$EnglishSchoolRequests->id,
                "total" => $request->fees,
                "pay" => 0,
                "remain" => $request->fees,
                "status_paied" => 'panding',
                "status_followed" => 'not follow',
                'creator'=>auth()->user()->name,
            ]);

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
                      'student_id'=> $EnglishSchoolRequests->student_id,
                      'media_name'=>$media_name,
                      'media_path'=> $fileNamePath,
                  ]);


            }

    }

    Alert::success('Update  Opration','Englis School Request  Updated Succssfully');
    return redirect()->route('english-school-request.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EnglishSchoolRequests  $englishSchoolRequests
     * @return \Illuminate\Http\Response
     */
    public function destroy(EnglishSchoolRequests $englishSchoolRequests)
    {
        $this->CanDoAction('admin', 'delete-request-english-school');

    }


    public function getEnglishSchool(){
        $englishSchools = EnglishSchool::get(['id','name']);


        return response()->json($englishSchools);

    }
    // public function getAgency(){
    //     $agencies = Agency::get(['id','name']);


    //     return response()->json($agencies);

    // }
    public function getstudents(){
        $students = Student::get(['id','name']);


        return response()->json($students);

    }

            public function All_Requests_In_Excel(){
            return Excel::download(new EnglishSchoolRequest, 'EnglishSchoolRequest.xlsx');

            }

            public function Requests_In_Excel(Request $request){
            // dd($request->all());
            // foreach($request->requests_ids as $id){
                $request->validate([

                    'requests_ids' => 'required|array',
                    'requests_ids.*' => ['required', 'max:255', 'distinct']
                ]);
            // }

            return Excel::download(new EnglishSchoolSpecificRequest($request), 'EnglishSchoolRequest.xlsx');

            // dd($request->all());
            }
}
