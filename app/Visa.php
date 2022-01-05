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
     
}
