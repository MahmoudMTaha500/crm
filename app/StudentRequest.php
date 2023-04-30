<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentRequest extends Model
{
    protected $table='student_requests';
    protected $guarded=[];
  
    public function student(){
       return  $this->belongsTo('App\Student','student_id','id');
    }
  
  
    
    public function study_place(){
        return  $this->belongsTo('App\Place_of_study','study_place_id','id');
     }
     public function salesman(){
        return  $this->belongsTo('App\SalesMan','salesman_id','id');
     }
     

}
