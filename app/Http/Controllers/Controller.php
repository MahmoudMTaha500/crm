<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function CanDoAction($adminRole,$permissionUser){
        if( auth()->user()->hasPermission($permissionUser) || auth()->user()->hasRole($adminRole))
        {

        }  else{
         return   abort(403, 'Unauthorized action.');

        }
    }
}
