<?php

namespace App\Http\Controllers;

use App\Agency;
use Illuminate\Http\Request;
use Alert;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()

    {
        $this->CanDoAction('admin','show-agency');

        $agencies = Agency::orderBy('id', 'DESC')->paginate(10);
        return view('admin.agencies.index', compact('agencies'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->CanDoAction('admin','create-agency');
            return view('admin.agencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Agency::create([
            'name'=>$request->name,
            'creator'=>auth()->user()->name,
        ]);
      Alert::success('Add Opreation','Add New Agency');
      return redirect()->route('agency.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function show(Agency $agency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function edit(Agency $agency)
    {
            $this->CanDoAction('admin','edit-agency');
            return view('admin.agencies.edit',compact('agency'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agency $agency)
    {
      $agency->name= $request->name;
      $agency->save();
      Alert::success('Edit Opreation',' Agency updated');
      return redirect()->route('agency.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agency $agency)
    {
            $this->CanDoAction('admin','delete-agency');
            $agency->delete();
            Alert::error('Delete Opreation',' Agency Deleted');
            return redirect()->route('agency.index');

    }
}
