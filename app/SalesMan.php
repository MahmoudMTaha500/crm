<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class SalesMan extends Model
{
   protected  $guarded=[];
   protected $table="users";
    protected static function booted()
    {
        static::addGlobalScope('salesman', function (Builder $builder) {
            $builder->where('department', "salesman");
        });
    }

}
