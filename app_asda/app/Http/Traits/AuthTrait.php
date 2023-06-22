<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{
    public function chekGuard($request){

      if ($request->type == 'teacher'){
            $guardName= 'teacher';
        }
        else{
            $guardName= 'web';
        }
        return $guardName;
    }

    public function redirect($request){

       
      
       if ($request->type == 'teacher'){
            return redirect()->intended(RouteServiceProvider::TEACHER);
        }
        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
