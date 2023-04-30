<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisaType extends Model
{
    protected $guarded=[];
    public function country(){
        return  $this->belongsTo('App\Country','country_id','id');
     }
}
