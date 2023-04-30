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
      $this->CanDoAction('admin','show-employee');

        $admins = User::orderBy('id', 'DESC')->paginate(10);
//        dd($admins);
        return view("admin.employees.index",compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->CanDoAction('admin','create-employee');

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
        // dd(auth()->user()->name);
//        dd($request->all());
        $admin = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "department" => $request->department,
            'creator'=>auth()->user()->name,
            "password" => bcrypt("$request->password"),
            ]);
            if($request->role == "admin"){
            $admin->attachRole($request->role);
            } else{
            $admin->attachRole($request->role);
                $admin->attachPermissions($request->permission);

            }
            Alert::success('Add Opreation', 'ُEmployee Added Successfully ');

            return redirect()->route('employee.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {
        $this->CanDoAction('admin','edit-employee');

        $emp  = User::find($id);
        // dd($emp);
        return view("admin.employees.edit",compact('emp'));

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
//        dd($request->all());
        $emp  = User::find($id);
        $emp->name = $request->name;
        $emp->email = $request->email;
        $emp->phone = $request->phone;
        $emp->department = $request->department;
        if($request->password){
            $emp->password = $request->password;
        }
        if($request->role =="admin"){
            $per = \DB::table('permission_user')->where('user_id',$id)->delete();
            $role = \DB::table('role_user')->where('user_id',$id)->delete();
            $emp->attachRole($request->role);
        } else{
            $role = \DB::table('role_user')->where('user_id',$id)->delete();
            $per = \DB::table('permission_user')->where('user_id',$id)->delete();
            $emp->attachRole($request->role);
            $emp->attachPermissions($request->permission);
        }
          $emp->save();
          Alert::success('Edit Opreation', 'ُEmployee Updated Successfully ');
          return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->CanDoAction('admin','delete-employee');

        $emp  = User::find($id);
        $emp->delete();
        Alert::error('Delete Opreation', 'ُEmployee Deleted Successfully ');
          return redirect()->route('employee.index');

    }
    public function getLogout()
{
    \Auth::logout();

    return redirect()->route('login');
}
}
