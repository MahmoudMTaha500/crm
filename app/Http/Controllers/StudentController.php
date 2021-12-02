<?php

namespace App\Http\Controllers;

use App\Student;
use App\Country;
use App\Student_media;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\student\StudentRequest;

class StudentController extends Controller
{
    public $student_id;
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
 

            $students = new Student;
            if($request->email){
                $students = $students->where('email',$email);

            }


            if($request->phone){
            $students = $students->where('phone',$phone);

            }
          
          

            if($request->name){
            $students =    $students->where('name','LIKE',"%{$request->name}%");
            } 
   

            $students=   $students->paginate(10);
       } else{
        $students = Student::paginate(10);
     
    
       }

        return view('admin.students.index' ,compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get();
        return view('admin.students.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
 
    //   dd($request->all());

        $student=  Student::create([
           'name'=>$request->name, 
           'email'=>$request->email, 
           'phone'=>$request->phone, 
           'address'=>$request->address, 
           'to_visa'=>$request->to_visa, 
           'creator_id'=>1, 
        ]);
        $this->student_id = $student->id;

        for($x=0;  $x < count($request->name_of_file)   ;$x++)
        {
            //   dump($request->name_of_file[$x]);
              $media_name=$request->name_of_file[$x];

              $objfile =$request->file[$x];
            //   dump( $objfile);

              $fileName = time() . $objfile->getClientOriginalName();
              $pathFile = public_path("storage/studentsMedia");
              $objfile->move($pathFile, $fileName);
              $fileNamePath = "storage/studentsMedia" . '/' . $fileName;
  
              Student_media::create([
                  'student_id'=> $student->id,
                  'media_name'=>$media_name,
                  'media_path'=> $fileNamePath,
              ]);
  
        }

        Alert::success('Add  Opration','Student Added Succssfully');
        return redirect()->route('student.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        // dd($student);

        $student_media = Student_media::where('student_id',$student->id)->get();

        return view('admin.students.show', compact('student','student_media'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        // dd($student);
        $student_media = Student_media::where('student_id',$student->id)->get();
        return view('admin.students.edit', compact('student','student_media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        // dd($request->all());
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->address=$request->address;
        $student->to_visa=$request->to_visa;
        $student->save();

        for($x=0;  $x < count($request->name_of_file)   ;$x++)
        {
            //   dump($request->name_of_file[$x]);
              $media_name=$request->name_of_file[$x];

              $objfile =$request->file[$x];
            //   dump( $objfile);

              $fileName = time() . $objfile->getClientOriginalName();
              $pathFile = public_path("storage/studentsMedia");
              $objfile->move($pathFile, $fileName);
              $fileNamePath = "storage/studentsMedia" . '/' . $fileName;
  
              Student_media::create([
                  'student_id'=> $student->id,
                  'media_name'=>$media_name,
                  'media_path'=> $fileNamePath,
              ]);
  
        }
        Alert::success('Update Opreation ','Student Updeted Successfully');
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        Alert::error('Delete  Opration','Student Deleted Succssfully');
        return redirect()->route('student.index');
    }

    public function deleteMedia($id){
        // dd($id); 
        $student_media = Student_media::find($id);
        File::delete($student_media->media_path);
        $student_media->delete();
        Alert::error('Delete  Opration','Student Media Deleted Succssfully');
        return back();
    }
}
