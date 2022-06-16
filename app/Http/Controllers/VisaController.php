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
        if($request->filter){
            //    dd($request->all());
            $email = $request->email;
            $phone = $request->phone;
    
            $name = $request->name;
     
    
                $visas = new Visa;
                if($request->email){
                    $visas = $visas->with('student')->whereHas('student',function($query) use ($email) {
                        $query->where('email',$email);
                    });
    
                }
    
    
                if($request->phone){
                     
                $visas = $visas->with('student')->whereHas('student',function($query) use ($phone){
                    $query->where('phone',$phone);
                });
    
                }
              
              
    
                if($request->name){
                $visas =    $visas->with('student')->whereHas('student',function($query) use($name){
                    $query->where('name','LIKE',"%{$name}%");
     
                });                
                } 
       
    
                $visas=   $visas->orderBy('id', 'DESC')->paginate(10);
           } else{
            $visas = Visa::with('student.media')->orderBy('id', 'DESC')->paginate(10);
         
        
           }
    
        //    dd($visa);
            return view('admin.visa.index' ,compact('visas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // $StudentController = new   StudentController();
        // $StudentController->store($request);


        /**\
         * "student" => "1"
  "country_id" => "3"
  "date" => "2022-06-06"
  "type" => "1"
  "fees" => "44"
  "salesman" => "3"
  "payment" => "Sat Acc"
  "bank" => "7"
  "transfer_bank" => "11"
  "name_of_file" => array:1 [▶]
  "status" => "Waiting for payment"
  "other" => null
         * */ 
        dd($request->all());
         Visa::create([
            'student_id'=>$request->student ,
            'date'=>$request->date ,
            'type_id'=>$request->type ,
            'salesman'=>$request->salesman ,
            'fees'=>$request->fees ,
            'country_id'=>$request->country_id ,
            'bank_id'=>$request->bank ,
            'transfer_bank_id'=>$request->transfer_bank ,
            "other" => $request->other,
            "status" => $request->status,
            'creator'=>auth()->user()->name,
        ]);
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
        $student_media = Student_media::where('student_id',$visa->student_id)->get();

        return view('admin.visa.edit',compact('visa','student_media'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function update(StudentsRequest $request, Visa $visa)
    {
        // dd($visa);
        $student = Student::find($visa->student_id);
        $StudentController = new StudentController;
        $StudentController->update($request,$student);

        $visa->status = $request->status;
        $visa->other = $request->other;
        $visa->save();
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
        $visa->delete();
        Alert::error('Delete  Opration','Visa Student Delteted Succssfully');
        return redirect()->route('visa.index');
    }
}
