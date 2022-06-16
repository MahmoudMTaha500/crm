<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table='universities';
    protected $guarded=[];


    public function country(){
        return  $this->belongsTo('App\Country','country_id','id');
     }
       
    public function city(){
        return  $this->belongsTo('App\City','city_id','id');
     }
    public function agency(){
        return  $this->belongsTo('App\Agency','agency_id','id');
     }
}
