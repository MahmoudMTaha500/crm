<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $table='agencies';
    protected $guarded=[];

    public function agency(){
        $this->belongsTo('App\University_Agencies','agency_id','id');
    }
}
