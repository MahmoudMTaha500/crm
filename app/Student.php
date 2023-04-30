<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table='students';
    protected $guarded=[];


    public function media(){
        return  $this->belongsTo('App\Student_media','student_id','id');
     }
     public function studentRequest(){
        return  $this->hasMany('App\StudentRequest','student_id','id');
     }
   //   public function universityRequests(){
   //      return  $this->hasMany('App\universityRequests','student_id','id');
   //   }
     
}
