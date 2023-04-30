<?php

namespace App\Http\Controllers;

use App\Place_of_study;
use App\Country;
use App\City;
use App\Http\Requests\study_place\studyPlaceRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\EnglishSchool;
use App\University;

class PlaceOfStudyController extends Controller
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
        $country_id = $request->country_id;
        $city_id = $request->city_id;
 

            $Place_of_study = new Place_of_study;
            if($request->country_id){
                $Place_of_study = $Place_of_study->where('country_id',$country_id);

            }


            if($request->city_id){
            $Place_of_study = $Place_of_study->where('city_id',$city_id);

            }
            if($request->type){
                $Place_of_study =  $Place_of_study->where('type_id',$request->type);
            }
          

            if($request->name){
            $Place_of_study =    $Place_of_study->where('name','LIKE',"%{$request->name}%");
            } 
   

            $Place_of_study=   $Place_of_study->orderBy('id', 'DESC')->paginate(10);
       } else{
        $Place_of_study = Place_of_study::orderBy('id', 'DESC')->paginate(10);
     
    
       }
      $countries = Country::get();

        // dd($places);
        return view('admin.place_of_studies.index' ,compact('Place_of_study','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get();

        return view('admin.place_of_studies.create',compact('countries'));
    }

    public function getCities(Request $request){
        // dd($request->all());
        $country_id = $request->country_id;
        $cities = City::where("country_id", $country_id)->get();

        $place = '' ;
        if($request->type=='school'){
            $place=EnglishSchool::find($request->place_id);
        }
        if($request->type=='university'){
            $place=University::find($request->place_id);
        }


        if($place){
            $html_city=' <option value=""> Chosse City </option>';
        foreach($cities as $city){
            $html_city .= "<option ".($place->city_id == $city->id ? 'selected' : '')."  value="."$city->id".">$city->name"." </option>";
        }
        } else{
            $html_city=' <option value=""> Chosse City </option>';
            foreach ($cities as $city) {
                $html_city .= "<option   value=" . " $city->id" . "> $city->name "." </option>";
            }
        }
        


if($country_id){
    $institutes = EnglishSchool::where('country_id',$country_id)->get();

    $universities = University::where("country_id", $country_id)->get();
    if($request->city_id){
        $institutes = EnglishSchool::where('country_id',$country_id)->where('city_id',$request->city_id)->get();

        $universities = University::where("country_id", $country_id)->where('city_id',$request->city_id)->get();
    }
} else{
    $institutes = EnglishSchool::get();

    $universities = University::get();

}
       



        $html_institute=' <option value=""> Chosse English School </option>';
        foreach($institutes as $institute){
            $html_institute .= "
           <option value="."$institute->id".">$institute->name"." </option>";
        }


        $html_university=' <option value=""> Chosse university </option>';
        foreach($universities as $university){
            $html_university .= "
           <option value="."$university->id".">$university->name"." </option>";
        }

        return response()->json( ['html_city'=>$html_city,'html_institute'=>$html_institute,'html_university'=>$html_university]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(studyPlaceRequest $request)
    {
        // dd($request->all());
        Place_of_study::create([
            'name'=>$request->name,
            'country_id'=>$request->country_id,
            'city_id'=>$request->city_id,
            'type_id'=>$request->type_id,
            'creator'=>auth()->user()->name,
        ]);
        Alert::success('Add Opreation', 'Place  Added Successfully ');
        return redirect()->route('place.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\place_of_study  $place_of_study
     * @return \Illuminate\Http\Response
     */
    public function show(place_of_study $place_of_study)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\place_of_study  $place_of_study
     * @return \Illuminate\Http\Response
     */
    public function edit(Place_of_study $place_of_study,Request $request,$id)
    {
        // dd($id);
        $place =Place_of_study::find($id);
        $countries = Country::get();

        return view("admin.place_of_studies.edit",compact('place','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\place_of_study  $place_of_study
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, place_of_study $place_of_study ,$id)
    {
            //    dd($request->all());
               $place =Place_of_study::find($id);
               $place->name = $request->name;
               $place->country_id = $request->country_id;
               $place->city_id = $request->city_id;
               $place->type_id = $request->type_id;
               $place->save();
               Alert::success('updated','Palce updated Successfully');
               return redirect()->route('place.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\place_of_study  $place_of_study
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place_of_study $place_of_study,$id)
    {
        // dd($id); 
        $place =Place_of_study::find($id);
        $place->delete();
   Alert::error('Delete','Deleted Place Successfully ');
   return redirect()->route('place.index');
    }
}
