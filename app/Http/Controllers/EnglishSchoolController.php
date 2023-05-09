<?php

namespace App\Http\Controllers;

use App\EnglishSchool;
use App\Country;
use Illuminate\Http\Request;
use Alert;

class EnglishSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->CanDoAction('admin','show-requestenglishschool');

        if($request->filter){
            //    dd($request->all());
            $country_id = $request->country_id;
            $city_id = $request->city_id;


                $EnglishSchool = new EnglishSchool;
                if($request->country_id){
                    $EnglishSchool = $EnglishSchool->where('country_id',$country_id);

                }


                if($request->city_id){
                $EnglishSchool = $EnglishSchool->where('city_id',$city_id);

                }
                if($request->type){
                    $EnglishSchool =  $EnglishSchool->where('type_id',$request->type);
                }


                if($request->name){
                $EnglishSchool =    $EnglishSchool->where('name','LIKE',"%{$request->name}%");
                }


                $EnglishSchool=   $EnglishSchool->orderBy('id', 'DESC')->paginate(10);
           } else{
            $EnglishSchool = EnglishSchool::orderBy('id', 'DESC')->paginate(10);


           }
          $countries = Country::get();

            // dd($places);
            return view('admin.englishSchools.index' ,compact('EnglishSchool','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->CanDoAction('admin','create-requestenglishschool');

        $countries = Country::get();
        return view('admin.englishSchools.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $EnglishSchool=   EnglishSchool::create([
            "name" => $request->name,
            "country_id" => $request->country_id,
            "city_id" => $request->city_id,
            "status" =>$request->status,
            "text_note" =>$request->note,
            "creator" =>auth()->user()->name,
            "duration" =>$request->duration,
            "start_date" =>$request->start_date,
            "end_date" =>$request->end_date,
        ]);
        Alert::success('Add Operation','Add New English School');
        return redirect()->route('english-school.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EnglishSchool  $englishSchool
     * @return \Illuminate\Http\Response
     */
    public function show(EnglishSchool $englishSchool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EnglishSchool  $englishSchool
     * @return \Illuminate\Http\Response
     */
    public function edit(EnglishSchool $englishSchool)
    {
        $this->CanDoAction('admin','edit-requestenglishschool');

        $countries  = Country::get();
        return view('admin.englishSchools.edit',compact('englishSchool','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EnglishSchool  $englishSchool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EnglishSchool $englishSchool)
    {
        $englishSchool->name = $request->name;
        $englishSchool->duration = $request->duration;
        $englishSchool->country_id = $request->country_id;
        $englishSchool->city_id = $request->city_id;
        $englishSchool->status = $request->status;
        $englishSchool->text_note = $request->note;
        $englishSchool->start_date = $request->start_date;
        $englishSchool->end_date = $request->end_date;
        $englishSchool->creator = auth()->user()->name;
        $englishSchool->save();
        Alert::success('Edit Operation','English School Has Been Updeted');
        return redirect()->route('english-school.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EnglishSchool  $englishSchool
     * @return \Illuminate\Http\Response
     */
    public function destroy(EnglishSchool $englishSchool)
    {
        $this->CanDoAction('admin','delete-requestenglishschool');

        $englishSchool->delete();
        Alert::error('Delete Operation','English School Has Deleted');
        return redirect()->route('english-school.index');

    }
}
