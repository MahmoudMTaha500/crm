<?php

namespace App\Http\Controllers;

use App\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Student_media;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\student\StudentsRequest;
use App\Student;

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
                    $visas = $visas->with('student')->whereHas(     'student',function($query) use ($email) {
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
        return view('admin.visa.create' );
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentsRequest $request)
    {
        $StudentController = new   StudentController();
        $StudentController->store($request);
         Visa::create([
            'student_id'=>$StudentController->student_id ,
            "other" => $request->other,
            "status" => $request->status,
            "creator_id" => 1,
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
