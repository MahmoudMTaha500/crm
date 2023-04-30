<?php

namespace App;
use App\commission;
use Illuminate\Database\Eloquent\Model;

class financeUniversity extends Model
{
    protected $guarded=[];

    public function request_uni(){
        return  $this->belongsTo('App\universityRequests','request_id','id');
     }
     public function commissions(){
        // return $this->belongsToMany('App\commission','finance_id','id');
        return $this->hasMany("App\Commission",'finance_id','id');
    }
}
