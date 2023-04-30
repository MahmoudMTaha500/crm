<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University_Agencies extends Model
{
    protected $table='university__agencies';
    protected $guarded=[];

        public function agency(){
            $this->belongsTo('App\Agency','agency_id','id');
        }
    
}
