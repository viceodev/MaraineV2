<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\RegisterTraits;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    
    use RegisterTraits;

    public function show(){
        if(Auth::check()){
            return redirect(Auth::user()->role."/");
        }else{
            return view('auth.register');
        }
        
    }

    public function register(Request $request){
        $validate = $this->checkInputs($request);

        return $validate;
    }
}
