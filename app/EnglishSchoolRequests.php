<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnglishSchoolRequests extends Model
{
    protected $guarded=[];


    public function student(){
        return  $this->belongsTo('App\Student','student_id','id');
     }



     public function englishschool(){
        return  $this->belongsTo('App\EnglishSchool','englishSchool_id','id');
     }
      public function salesman(){
         return  $this->belongsTo('App\SalesMan','salesman_id','id');
      }
      public function markter(){
         return  $this->belongsTo('App\Markter','markter_id','id');
      }
      public function agency(){
         return  $this->belongsTo('App\Agency','agency_id','id');
     }
     public  function englishSchoolFinance(){
         return  $this->hasMany('App\EnglishSchoolFinance','request_id','id');

     }
}
