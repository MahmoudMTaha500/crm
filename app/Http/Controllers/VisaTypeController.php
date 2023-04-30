<?php

namespace App\Http\Controllers;

use App\VisaType;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Country;

class VisaTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->CanDoAction('admin', 'show-visa');

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
        $this->CanDoAction('admin', 'create-visa');
        $countries =Country::get();
        return view("admin.visaType.create",compact('countries'));
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
            "country_id" =>$request->country_id,
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
        $this->CanDoAction('admin', 'edit-visa');

        $countries =Country::get();

        return view("admin.visaType.edit" ,compact('visaType','countries'));
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
        $visaType->country_id = $request->country_id;

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
        $this->CanDoAction('admin', 'delete-visa');

        $visaType->delete();
        Alert::error('Delete  Opration','Visa Type  Deleted Succssfully');
        return redirect()->route('visa-type.index');

    }


    public function getType(Request $request)
    {

        $visaTypes = VisaType::where('country_id', $request->country_id)->get();
        $visaTypes_html=' <option value="">  Chose Visa Type  </option>';
        foreach ($visaTypes as $type) {
            $visaTypes_html .= "<option   value=" . " $type->id" . "> $type->name "." </option>";
        }
        return response()->json( ['visaTypes_html'=>$visaTypes_html]);

    }
}
