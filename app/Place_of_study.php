<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place_of_study extends Model
{
    protected $table ='place_of_studies';
    protected $guarded=[];
      
    public function country(){
        return  $this->belongsTo('App\Country','country_id','id');
     }
       
    public function city(){
        return  $this->belongsTo('App\City','city_id','id');
     }
       
    public function type(){
        return  $this->belongsTo('App\Type_of_place','type_id','id');
     }
}
