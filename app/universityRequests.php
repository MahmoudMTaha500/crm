<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class universityRequests extends Model
{
    protected $guarded=[];


    public function student(){
        return  $this->belongsTo('App\Student','student_id','id');
     }



     public function university(){
        return  $this->belongsTo('App\University','university_id','id');
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
    public  function universityFinance(){
            return  $this->hasMany('App\financeUniversity','request_id','id');

    }

}
