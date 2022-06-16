<?php

namespace App\Http\Controllers;

use App\VisaType;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VisaTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visaTypes = VisaType::orderBy('id', 'DESC')->paginate(10);
        return view("admin.visaType.index" ,compact('visaTypes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.visaType.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
              
            'name' => 'required',
            'type' => 'required'
        ]);
        // dd($request->all());
        VisaType::create([
            "name" =>$request->name,
            "type" =>$request->type,
            "creator" =>auth()->user()->name,


        ]);
        Alert::success('Add  Opration','Visa Type  Added Succssfully');
        return redirect()->route('visa-type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VisaType  $visaType
     * @return \Illuminate\Http\Response
     */
    public function show(VisaType $visaType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VisaType  $visaType
     * @return \Illuminate\Http\Response
     */
    public function edit(VisaType $visaType)
    {
        return view("admin.visaType.edit" ,compact('visaType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VisaType  $visaType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisaType $visaType)
    {
        // dd($visaType);
        $visaType->name = $request->name;
        $visaType->type = $request->type;
        $visaType->save();
        Alert::success('Update  Opration','Visa Type  Updated Succssfully');
        return redirect()->route('visa-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VisaType  $visaType
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisaType $visaType)
    {
        $visaType->delete();
        Alert::error('Delete  Opration','Visa Type  Deleted Succssfully');
        return redirect()->route('visa-type.index');

    }
}
