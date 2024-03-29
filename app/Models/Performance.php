<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
