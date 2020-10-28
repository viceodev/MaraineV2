<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Traits\RegisterTraits;
use Laravel\Socialite\Facades\Socialite;

trait LoginTraits{

    use RegisterTraits;

    public function checkInputs($request){
        if( empty($request->user_info) || empty($request->password)){
            return back()->withInput()->with('error', 'Please fill out all fields');
        }else{
            // return $this->LoginLogic($request);
            return $this->LoginLogic($request);
        }
    }



    public function LoginLogic($request){
        $remember = $request->remember;
        $user_info = $request->user_info;

        $user = User::where('username', $user_info)->get();

        if(count($user) == 0){
            $user = User::where('email', $request->user_info)->get();
        }

            
        
        
        if(count($user) > 0 ){
            $email = $user[0]->email;

            if($user[0]->banned === true){
                back()->withInput()->with('error', 'You have been banned.Please contact our support team via <a href="mailto::support@jetstream.com">Support@jetstream.com</a>');
            }elseif($remember){
                if(Auth::attempt(['email' => $email, 'password' => $request->password], $remember)){
                    return redirect()->intended(Auth::user()->role."/");
                }else{
                    return back()->withInput()->with('error', 'Your password is incorrect');
                }
            }else{
                if(Auth::attempt(['email' => $email, 'password' => $request->password])){
                    return redirect()->intended(Auth::user()->role);
                }else{
                    return back()->withInput()->with('error', 'Your password is incorrect');
                }              
            }
        }else{
            return back()->withInput()->with('error', 'User does not exist. Please register to continue.');
        }


    }

    public function LoginSocial($provider){
        $providerUser = Socialite::driver($provider)->user();

        $user = User::where('email', $providerUser->getEmail())->first();
        

        if(! user){
            if($providerUser->getAvatar == null || ! $providerUser->getAvatar()){
                $picture = asset('storage/picture/profile.svg');
            }else{
                $picture = $providerUser->getAvatar();
            }

            $user = new User();

            $user->name = $providerUser->getName();
            $user->username = $providerUser->getNickname();
            $user->email = $providerUser->getEmail();
            $user->reg_no = $this->regGenerator();
            $user->picture = $picture;
            $user->role = 'student';
            $user->provider = $provider;
            $user->provider_id = $providerUser->getId();
        }

        Auth::login($user, true);

        return redirect()->intended(Auth::user()->role."/");
    }
}