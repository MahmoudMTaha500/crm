<?php

namespace App\Http\Controllers;

use App\University;
use App\Country;
use App\Agency;
use Illuminate\Http\Request;
use App\Http\Requests\university\UniversityRequest;
use App\University_Agencies;
use Alert;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->CanDoAction('admin', 'show-request-university');

        if($request->filter){
            //    dd($request->all());
            $country_id = $request->country_id;
            $city_id = $request->city_id;


                $University = new University;
                if($request->country_id){
                    $University = $University->where('country_id',$country_id);

                }


                if($request->city_id){
                $University = $University->where('city_id',$city_id);

                }
                if($request->type){
                    $University =  $University->where('type_id',$request->type);
                }


                if($request->name){
                $University =    $University->where('name','LIKE',"%{$request->name}%");
                }


                $University=   $University->orderBy('id', 'DESC')->paginate(10);
           } else{
            $University = University::orderBy('id', 'DESC')->paginate(10);


           }
          $countries = Country::get();

            // dd($places);
            return view('admin.universities.index' ,compact('University','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->CanDoAction('admin', 'create-request-university');

        $countries = Country::get();
        $Agencies = Agency::get();

        return view('admin.universities.create',compact('countries','Agencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UniversityRequest $request)
    {
        // dd($request->all());

       $university=   University::create([
            "name" => $request->name,
            "country_id" => $request->country_id,
            "city_id" => $request->city_id,
            // "status" =>$request->status,
            // "text_note" =>$request->note,
            "creator" =>auth()->user()->name,
            // "academic_year" =>$request->academic_year,
        ]);
        $agencies= $request->agency_id;
        foreach($agencies as $agency){
            University_Agencies::create([
                'university_id'=>$university->id,
                'agency_id'=>$agency,
            ]);
        }
        Alert::success('Add Operation','Add New University');
        return redirect()->route('university.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function edit(University $university)
    {
        $this->CanDoAction('admin', 'edit-request-university');

        $countries = Country::get();
        $Agencies = Agency::get();
        $uni_agency = University_Agencies::where('university_id',$university->id)->get();
        // dd($uni_agency);

        return view('admin.universities.edit',compact('countries','Agencies','university','uni_agency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, University $university)
    {
        $university->name=$request->name;
        $university->country_id=$request->country_id;
        $university->city_id=$request->city_id;
        $uni_agency = University_Agencies::where('university_id',$university->id)->delete();
        $agencies= $request->agency_id;
        foreach($agencies as $agency){
            University_Agencies::create([
                'university_id'=>$university->id,
                'agency_id'=>$agency,
            ]);
        }
        $university->save();
        Alert::success('Edit Operation',' University Has Been Updated');
        return redirect()->route('university.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy(University $university)
    {
        $this->CanDoAction('admin', 'delete-request-university');

        University_Agencies::where('university_id',$university->id)->delete();
        $university->delete();
        Alert::error('Delete Operation ','University Has Been Deleted');
        return redirect()->route('university.index');
    }
}
