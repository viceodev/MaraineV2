<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tickets;
use App\Http\Traits\StudentTraits;

class PagesController extends Controller
{

    use StudentTraits;

    public function info(){
        $info = [];

            $tickets = Tickets::where('user_id', auth()->user()->id)->cursor()->filter(function($ticket){
                return $ticket->is_active != 0; 
            });

            if(auth()->user()->courses != null){
                $courses = json_decode(auth()->user()->courses, true);
                $user_courses = array_merge($courses['main'],$courses['optional'],$courses['language']); 
            }else{
                $user_courses = [];
            }

            $info['preference'] = auth()->user()->email_preference;
            $info['active_tickets'] = count($tickets);
            $info['active_courses'] = count($user_courses);

            return $info;
    }

    public function profile($username){
        if(strtolower(Auth::user()->username) == strtolower($username)){
            $info = $this->info();
            return view('general.profile', ['info' => $info]);
            // return $info;
        }else{
            return view('visitor.profile');
        }
    }


    public function payments($provider){
        $allowed = ['paypal', 'stripe', 'credit-card'];

        if(!in_array(strtolower($provider), $allowed)){
            return back()->with('error', 'Payment method not supported');
        }else{
            $info = $this->info();
            return view('general.payments', ['method' => strtolower($provider)])->with('info', $info);
        }
    }
}
