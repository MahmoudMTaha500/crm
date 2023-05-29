<?php

namespace App\Http\Controllers;

use App\Models\Performance;
use App\Http\Requests\StorePerformanceRequest;
use App\Http\Requests\UpdatePerformanceRequest;
use App\User;
use Illuminate\Http\Request;


class PerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->CanDoAction('admin','show-employee');
        if($request->filter){
            $name = $request->name;
            $Performance= new Performance;
            if($name){
                $Performance = $Performance->where('name','LIKE',"%{$name}%");
            }
            $Performance=   $Performance->orderBy('id', 'DESC')->paginate(10);
        } else{
            $Performance = Performance::orderBy('id', 'DESC')->paginate(10);

        }
        return view("admin.employees.performance",compact('Performance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePerformanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePerformanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Performance  $performance
     * @return \Illuminate\Http\Response
     */
    public function show(Performance $performance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Performance  $performance
     * @return \Illuminate\Http\Response
     */
    public function edit(Performance $performance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePerformanceRequest  $request
     * @param  \App\Models\Performance  $performance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerformanceRequest $request, Performance $performance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Performance  $performance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Performance $performance)
    {
        //
    }

    public  function AddBounces($user_id,$key,$request_id,$type_request )
    {

     $getPerformance = Performance::where('user_id',$user_id)->where('key',$key)->get()->first();
     if(!$getPerformance){
         return Performance::create([
               'request_id'=>$request_id,
               'user_id'=>$user_id,
               'key'=>$key,
               'type'=>$type_request,
               'counter'=>1,
           ]);
     }
     $getPerformance->counter = $getPerformance->counter+1;
     $getPerformance->save();

    }

    /************************************************/
    public  function CheckTheBouncesIsValid( $request_id, $type_request) :void
    {
     Performance::where('request_id',$request_id)->where('type',$type_request)->delete();
    }
}
