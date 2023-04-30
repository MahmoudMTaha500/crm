<?php

namespace App\Http\Controllers;

use App\Markter;
use Illuminate\Http\Request;
use Alert;
class MarkterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->CanDoAction('admin', 'show-marketer');

        $markters = Markter::orderBy('id', 'DESC')->paginate(10);
        return view('admin.markters.index',compact('markters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->CanDoAction('admin', 'create-marketer');

        return view('admin.markters.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Markter::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'creator'=>auth()->user()->name,

        ]);

        Alert::success('Add Opreation', 'Markter  Added Successfully ');
        return redirect()->route('markter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Markter  $markter
     * @return \Illuminate\Http\Response
     */
    public function show(Markter $markter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Markter  $markter
     * @return \Illuminate\Http\Response
     */
    public function edit(Markter $markter)
    {
        $this->CanDoAction('admin', 'edit-marketer');

        return view('admin.markters.edit',compact('markter'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Markter  $markter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Markter $markter)
    {
        $markter->name = $request->name;
        $markter->phone = $request->phone;
        $markter->save();

        Alert::success('Update Opreation', 'Markter  Updateed Successfully ');
        return redirect()->route('markter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Markter  $markter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Markter $markter)
    {
        $this->CanDoAction('admin', 'delete-marketer');

        $markter->delete();
        Alert::success('Delete Opreation', 'Markter  Deleteed Successfully ');
        return redirect()->route('markter.index');

    }
}
