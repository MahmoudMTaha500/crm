<?php

namespace App\Http\Controllers;

use App\Models\CoursesEnglishSchool;
use App\Http\Requests\StoreCoursesEnglishSchoolRequest;
use App\Http\Requests\UpdateCoursesEnglishSchoolRequest;
use Alert;

class CoursesEnglishSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->CanDoAction('admin', 'show-requestenglishschool');
        $courses = CoursesEnglishSchool::orderBy('id', 'DESC')->paginate(10);
        return view('admin.coursesEnglishSchools.index', compact('courses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->CanDoAction('admin', 'create-requestenglishschool');
        return view('admin.coursesEnglishSchools.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCoursesEnglishSchoolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoursesEnglishSchoolRequest $request)
    {
        CoursesEnglishSchool::create([
            'name'=>$request->name,
            'creator'=>auth()->user()->name,
        ]);
        Alert::success('Add Opreation','Add New course');
        return redirect()->route('course-english-school.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoursesEnglishSchool  $coursesEnglishSchool
     * @return \Illuminate\Http\Response
     */
    public function show(CoursesEnglishSchool $coursesEnglishSchool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoursesEnglishSchool  $coursesEnglishSchool
     * @return \Illuminate\Http\Response
     */
    public function edit(CoursesEnglishSchool $coursesEnglishSchool,$id)
    {
        $this->CanDoAction('admin', 'create-requestenglishschool');

        $coursesUniversity = CoursesEnglishSchool::find($id);
        $course = $coursesUniversity;
        return view('admin.coursesEnglishSchools.edit',compact('course'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCoursesEnglishSchoolRequest  $request
     * @param  \App\Models\CoursesEnglishSchool  $coursesEnglishSchool
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoursesEnglishSchoolRequest $request, $id, CoursesEnglishSchool $coursesEnglishSchool)
    {
        $coursesEnglishSchool = CoursesEnglishSchool::find($id);
        $coursesEnglishSchool->name= $request->name;
        $coursesEnglishSchool->save();
        Alert::success('Edit Operation',' Course updated');
        return redirect()->route('course-english-school.index');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoursesEnglishSchool  $coursesEnglishSchool
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoursesEnglishSchool $coursesEnglishSchool,$id)
    {
        $this->CanDoAction('admin', 'delete-requestenglishschool');
        $coursesEnglishSchool = CoursesEnglishSchool::find($id);
        $coursesEnglishSchool->delete();
        Alert::error('Delete Operation',' Course Deleted');
        return redirect()->route('course-english-school.index');

    }
}
