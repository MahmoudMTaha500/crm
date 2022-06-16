<?php

namespace App\Http\Controllers;

use App\SalesMan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\salesmen\SalesMenRequest;

class SalesManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesmans = SalesMan::orderBy('id', 'DESC')->paginate(10);
        return view('admin.salesmans.index',compact('salesmans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.salesmans.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalesMenRequest $request)
    {
        // dd($request->all());
        
        SalesMan::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'creator'=>auth()->user()->name,
          
        ]);

        Alert::success('Add Opreation', 'SalesMan  Added Successfully ');
        return redirect()->route('salesman.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalesMan  $salesMan
     * @return \Illuminate\Http\Response
     */
    public function show(SalesMan $salesMan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalesMan  $salesMan
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesMan $salesMan,$id)
    {
        // dd($id);
        $salesMan =SalesMan::find($id);
        return view('admin.salesmans.edit',compact('salesMan'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalesMan  $salesMan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesMan $salesMan , $id)
    {
        $salesMan =SalesMan::find($id);
        $salesMan->name = $request->name;
        $salesMan->phone = $request->phone;
        $salesMan->save();
        Alert::success('Update Opreation', 'SalesMan  Updated Successfully ');
        return redirect()->route('salesman.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalesMan  $salesMan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesMan $salesMan,$id)
    {
        $salesMan =SalesMan::find($id);
        $salesMan->delete();
        Alert::error('Delete Opreation', 'SalesMan  Deleted  Successfully ');
        return redirect()->route('salesman.index');
    }
}
