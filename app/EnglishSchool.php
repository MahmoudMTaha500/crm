<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnglishSchool extends Model
{
    protected $table='english_schools';
    protected $guarded=[];


    public function country(){
        return  $this->belongsTo('App\Country','country_id','id');
     }
       
    public function city(){
        return  $this->belongsTo('App\City','city_id','id');
     }
}
