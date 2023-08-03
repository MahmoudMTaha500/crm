<?php

namespace App\Http\Controllers;

use App\Models\CoursesUniversity;
use App\Http\Requests\StoreCoursesUniversityRequest;
use App\Http\Requests\UpdateCoursesUniversityRequest;
use Alert;

class CoursesUniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->CanDoAction('admin','show-requestuniversity');

        $courses = CoursesUniversity::orderBy('id', 'DESC')->paginate(10);
        return view('admin.coursesUniversities.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->CanDoAction('admin', 'create-requestuniversity');
        return view('admin.coursesUniversities.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCoursesUniversityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoursesUniversityRequest $request)
    {
        CoursesUniversity::create([
            'name'=>$request->name,
            'creator'=>auth()->user()->name,
        ]);
        Alert::success('Add Opreation','Add New course');
        return redirect()->route('course-university.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoursesUniversity  $coursesUniversity
     * @return \Illuminate\Http\Response
     */
    public function show(CoursesUniversity $coursesUniversity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoursesUniversity  $coursesUniversity
     * @return \Illuminate\Http\Response
     */
    public function edit(CoursesUniversity $coursesUniversity,$id)
    {
        $this->CanDoAction('admin', 'edit-requestuniversity');

        $coursesUniversity = CoursesUniversity::find($id);
        $course = $coursesUniversity;
        return view('admin.coursesUniversities.edit',compact('course'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCoursesUniversityRequest  $request
     * @param  \App\Models\CoursesUniversity  $coursesUniversity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoursesUniversityRequest $request, CoursesUniversity $coursesUniversity,$id)
    {
        $coursesUniversity = CoursesUniversity::find($id);
        $coursesUniversity->name= $request->name;
        $coursesUniversity->save();
        Alert::success('Edit Operation',' Course updated');
        return redirect()->route('course-university.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoursesUniversity  $coursesUniversity
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoursesUniversity $coursesUniversity)
    {
        $this->CanDoAction('admin', 'delete-requestuniversity');
        $coursesUniversity->delete();
        Alert::error('Delete Operation',' Course Deleted');
        return redirect()->route('course-university.index');
    }
}
