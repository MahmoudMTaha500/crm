<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests\country\countryrequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CountryController extends Controller
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
            $name = $request->name;
            
    // dd($fromDate);
    
                $countries = new Country;
                if($name){
                    $countries = $countries->where('name','LIKE',"%{$name}%");
                }
              
    
                $countries=   $countries->paginate(10);
               
                // dd( $studentRequests);
    
    
           } else{
            $countries = Country::paginate(10);

         
        
           }
      $department_name = 'Countries';
      $page_name = 'Countries';
      $page_title = 'Countries';

        return view('admin.countries.index',compact('countries','department_name','page_name','page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(countryrequest $request)
    {
        // dd($request->all());
        $name = $request->name;
        Country::create([
            'name'=>$name, 
            'creator_id'=>1
            
        ]);
        Alert::success('Add Opreation', 'Country Added Successfully ');
        return redirect()->route('country.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('admin.countries.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {

        // dd($request->all());
        $country->name = $request->name;
        $country->save();   
        alert()->success('SuccessAlert',' Your Opreation Updated Successfully.');       
         return redirect()->route('country.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        alert()->error('ErrorAlert','Country Deleted Successfully.');
        return redirect()->route('country.index');

    }
}
