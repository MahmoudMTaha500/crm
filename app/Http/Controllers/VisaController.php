<?php

namespace App\Http\Controllers;

use App\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Student_media;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\student\StudentsRequest;
use App\Student;
use App\Country;
use App\VisaType;
use App\SalesMan;
use App\Bank;
class VisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        $this->CanDoAction('admin', 'show-visa');


        if($request->filter){
            //    dd($request->all());
                $student = $request->student;
                $country_id = $request->country_id;
                $type = $request->type;
                $fees = $request->fees;
                $salesman = $request->salesman;
                $payment = $request->payment;
                $bank = $request->bank;
                $transfer_bank = $request->transfer_bank;
                $status = $request->status;
                $date = $request->date;

                $visas = new Visa;
                if($student){
                    $visas =      $visas->where('student_id', '=', "$student" );
                }
                if($request->country_id){
                    $visas =      $visas->where('country_id', '=', "$country_id" );
                }

                if($type){
                    $visas =      $visas->where('type_id', '=', "$type" );
                  }
                if($fees){
                    $visas =      $visas->where('fees', '=', "$fees" );
                  }
                if($salesman){
                    $visas =      $visas->where('salesman_id', '=', "$salesman" );
                  }
                if($payment){
                    $visas =      $visas->where('payment', '=', "$payment" );
                  }
                if($bank){
                    $visas =      $visas->where('bank_id', '=', "$bank" );
                  }
                if($transfer_bank){
                    $visas =      $visas->where('transfer_bank_id', '=', "$transfer_bank" );
                  }
                if($status){
                    $visas =      $visas->where('status', '=', "$status" );
                  }
                  if($date){
                    $visas =      $visas->where('date', '=', "$date" );
                  }

                $visas=   $visas->orderBy('id', 'DESC')->paginate(10);
           } else{
            $visas = Visa::with('student.media')->orderBy('id', 'DESC')->paginate(10);


           }

        //    dd($visa);
        $students =Student::get();
        $countries =Country::get();
        $types =VisaType::get();
        $salsmens =SalesMan::get();
        $banks =Bank::get();
            return view('admin.visa.index' ,compact('visas','students','countries','types','salsmens','banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->CanDoAction('admin', 'create-visa');

        $students =Student::get();
        $countries =Country::get();
        $types =VisaType::get();
        $salsmens =SalesMan::get();
        $banks =Bank::get();
        return view('admin.visa.create',compact('students','countries','types','salsmens','banks') );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Visa::create([
            'student_id'=>$request->student ,
            'date'=>$request->date ,
            'type_id'=>$request->type ,
            'salesman_id'=>$request->salesman ,
            'fees'=>$request->fees ,
            'country_id'=>$request->country_id ,
            'bank_id'=>$request->bank ,
            'transfer_bank_id'=>$request->transfer_bank ,
            "other" => $request->other,
            "payment" => $request->payment,
            "status" => $request->status,
            "paid" => $request->paid,
            'creator'=>auth()->user()->name,
        ]);
        if($request->status =="Applied"){
             if($request->paid){
                 $key="Paid";

             } else {
                 $key="Unpaid";

             }
            $user_id = auth()->user()->id;
            $salesman = $request->salesman;
            $employeeBonus  = new PerformanceController();
            $employeeBonus->AddBounces($user_id,$key);
            $employeeBonus->AddBounces($salesman,$key);

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
         Alert::success('Add  Opration','Visa Student Added Succssfully');
         return redirect()->route('visa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function show(Visa $visa)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function edit(Visa $visa)
    {
        $this->CanDoAction('admin', 'edit-visa');

        $student_media = Student_media::where('student_id',$visa->student_id)->get();
        $student = Student::where('id',$visa->student_id)->get();
        $students =Student::get();
        $countries =Country::get();
        $types =VisaType::get();
        $salsmens =SalesMan::get();
        $banks =Bank::get();
        return view('admin.visa.edit',compact('visa','student_media','student','students','countries','types','salsmens','banks'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visa $visa)
    {
        $visa->student_id = $request->student;
        $visa->type_id = $request->type;
        $visa->salesman_id = $request->salesman;
        $visa->fees = $request->fees;
        $visa->country_id = $request->country_id;
        $visa->bank_id = $request->bank;
        $visa->transfer_bank_id = $request->transfer_bank;
        $visa->status = $request->status;
        $visa->paid = $request->paid;
        $visa->other = $request->other;
        $visa->creator =auth()->user()->name;
        $visa->save();
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

        Alert::success('update  Opration','Visa Student Updated Succssfully');
        return redirect()->route('visa.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visa $visa)
    {
        $this->CanDoAction('admin', 'delete-visa');

        $visa->delete();
        Alert::error('Delete  Opration','Visa Student Delteted Succssfully');
        return redirect()->route('visa.index');
    }
}
