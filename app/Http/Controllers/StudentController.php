<?php

namespace App\Http\Controllers;

use App\Student;
use App\Country;
use App\Student_media;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\student\StudentsRequest;
use App\Http\Controllers\VisaController;
use App\Visa;
use App\StudentRequest;
use App\Agency;
use App\University_Agencies;
use App\University;
use App\universityRequests;
use App\EnglishSchoolRequests;

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
        $this->CanDoAction('admin', 'show-student');

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


            $students=   $students->orderBy('id', 'DESC')->paginate(10);
       } else{
        $students = Student::with('studentRequest.study_place')->orderBy('id', 'DESC')->paginate(10);


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
        $this->CanDoAction('admin', 'create-student');

        $countries = Country::get();
        return view('admin.students.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentsRequest $request)
    {

    //   dd($request->all());

        $student=  Student::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'phone'=>$request->phone,
           'student_type'=>$request->student_type,
           'nationality'=>$request->nationality,
           'creator'=>auth()->user()->name,
        ]);


        $this->student_id = $student->id;
          if($request->file){

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

}

if($request->to_visa){
    Visa::create([
        'student_id'=>$student->id ,
    // "status" => $request->status,

        "creator_id" => 1,
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

        $StudentsRequest=universityRequests::where('student_id',$student->id)->with('university')->get();
        $englishSchoolsRequests = EnglishSchoolRequests::where('student_id',$student->id)->with('englishschool')->get();
        $student_media = Student_media::where('student_id',$student->id)->get();
        $visas = Visa::where('student_id',$student->id)->get();
        return view('admin.students.show', compact('student','student_media','StudentsRequest','englishSchoolsRequests','visas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $this->CanDoAction('admin', 'edit-student');

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
        $student->student_type=$request->student_type;
        $student->nationality=$request->nationality;
        $student->save();
if($request->file){

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


}

if($request->to_visa){
    Visa::create([
        'student_id'=>$student->id ,
    // "status" => $request->status,

        "creator_id" => 1,
    ]);
} else{
      Visa::where('student_id',$student->id)->delete();
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
        $this->CanDoAction('admin', 'delete-student');

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
