<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnglishSchoolFinance extends Model
{
    protected $guarded=[];

    public function request_institute(){
        return  $this->belongsTo('App\EnglishSchoolRequests','request_id','id');
     }
     public function commissions(){
        // return $this->belongsToMany('App\commission','finance_id','id');
        return $this->hasMany("App\Commission",'finance_english_school_id','id');
    }
}
