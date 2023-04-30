<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;
use Alert;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->CanDoAction('admin','show-bank');

            $banks = Bank::orderBy('id', 'DESC')->paginate(10);
            return view('admin.banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->CanDoAction('admin','create-bank');
            return view('admin.banks.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bank::create([
            'name'=>$request->name,
            'creator'=>auth()->user()->name,
        ]);
      Alert::success('Add Opreation','Add New Bank');
      return redirect()->route('bank.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        $this->CanDoAction('admin','edit-bank');
            return view('admin.banks.edit',compact('bank'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $bank->name= $request->name;
      $bank->save();
      Alert::success('Edit Opreation',' Bank updated');
      return redirect()->route('bank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        $this->CanDoAction('admin','delete-bank');
        $bank->delete();
            Alert::error('Delete Opreation',' Bank Deleted');
            return redirect()->route('bank.index');

    }
}
