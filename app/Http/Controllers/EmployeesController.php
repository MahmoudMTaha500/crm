<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests\employee\EmployeesRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Permission;


use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $admins = User::paginate(10);
        return view("admin.employees.index",compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.employees.create");
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeesRequest $request)
    {
        $admin = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt("$request->password"),
            ]);
            if($request->role =="admin"){
            $admin->attachRole($request->role);
            } else{
            $admin->attachRole($request->role);
            // $admin->attachPermissions($request->permession);
            }
            // session()->flash('alert_message', ['message' => 'تم ارجاع المعهد بنجاح', 'icon' => 'success']);
            Alert::success('Add Opreation', 'ُEmployee Added Successfully ');

            return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getLogout()
{
    \Auth::logout();

    return redirect()->route('login');
}
}
