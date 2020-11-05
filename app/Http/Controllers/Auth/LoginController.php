<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Traits\LoginTraits;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use LoginTraits;

    public function show(){
        // if(Auth::check()){
        //     return redirect(Auth::user()->role."/");
        // }else{
            return view('auth.login');
        // }
        
    }

    public function login(Request $request){
        $user = $this->checkInputs($request);

        return $user;
    }


    public function socials($provider){
        return Socialite::driver($provider)->redirect();
    }


    public function socials_callback($provider){
        return $this->LoginSocial($provider);
    }

    public function forgot_instance(Request $request){
        return $this->forgot_start($request);
    }

    public function reset_password(Request $request){
        return $request;
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();

        return redirect()->route('login');
    }
}
