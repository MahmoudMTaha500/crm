<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    protected $table = 'visas';
    protected $guarded=[];
    public function student(){
        return  $this->belongsTo('App\Student','student_id','id');
     }
    public function type(){
        return  $this->belongsTo('App\VisaType','type_id','id');
     }
    public function bank(){
        return  $this->belongsTo('App\Bank','bank_id','id');
     }
     public function salesman(){
        return  $this->belongsTo('App\SalesMan','salesman_id','id');
     }
     public function country(){
        return  $this->belongsTo('App\Country','country_id','id');
     }
       
     
}
