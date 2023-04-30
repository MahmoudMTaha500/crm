<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Http\Requests\city\cityrequest;
use Illuminate\Http\Request;
use Alert;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->CanDoAction('admin','show-city');

            if($request->filter){
                $country_id = $request->country_id;
                $name = $request->name;
                $cities = new city;
                if($country_id){
                    $cities = $cities->where('country_id',$country_id);
                }
                if($name){
                    $cities = $cities->where('name','LIKE',"%{$name}%");
                }
                $cities=   $cities->orderBy('id', 'DESC')->first()->paginate(10);
            } else{
                $cities = City::orderBy('id', 'DESC')->paginate(10);
            }


            $countries = Country::get();
            $department_name = 'cities';
            $page_name = 'cities';
            $page_title = 'cities';
            return view('admin.cities.index',compact('cities','department_name','page_name','page_title','countries'));

   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $this->CanDoAction('admin','create-city');
        $countries = Country::get();
          return view('admin.cities.create',compact('countries'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(cityrequest $request)
    {
        $name = $request->name;
        $country_id = $request->country_id;
        City::create([
            'name'=>$name,
            'country_id'=>$country_id,
            'creator'=>auth()->user()->name,
        ]);
        Alert::success('Add Opreation', 'City Added Successfully ');
        return redirect()->route('city.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $this->CanDoAction('admin','edit-city');

        $countries = Country::get();
            return view('admin.cities.edit',compact('city','countries'));





    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $city->name = $request->name;
        $city->country_id = $request->country_id;
        $city->save();
        alert()->success('SuccessAlert',' Your Opreation Updated Successfully.');
         return redirect()->route('city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $this->CanDoAction('admin','delete-city');

        $city->delete();
            alert()->error('ErrorAlert','City Deleted Successfully.');
            return redirect()->route('city.index');


    }
}
