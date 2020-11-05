<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\StudentTraits;
use App\Http\Traits\GeneralTraits;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Submit;
use App\Models\Ticket_reply;
use App\Models\Tickets;

class ProfileController extends Controller
{
    
    use StudentTraits;

    public function delete_image(){
        $profile_img_name = auth()->user()->picture;
        $main_name = explode("/", $profile_img_name);
        $main_name = strtolower($main_name[count($main_name) - 1]);

        if($main_name == 'profile.svg'){
            return back()->with('success', 'Profile image deleted successfully');
        }else{
            $exists = Storage::disk('local')->exists('public/picture/'.$main_name);

            if($exists == true){
                if(Storage::delete('public/picture/'.$main_name)){
                    $default_profile = asset("storage/picture/profile.svg");
                    $user = User::find(auth()->user()->id);
                    $user->picture = $default_profile;
                    $user->save();

                    return back()->with('success', 'Profile image deleted successfully');
                }
            }else{
                return back()->with('error', "Opps! An error occured. Your image can't be found. Please contact our support team for help");
            }
        }
    }

    public function image_update(Request $request){
        if(empty($request->new_image)){
            return back()->with('error', 'Please choose an image');
        }else{
            $allowed = ['png', 'jpeg', 'jpg', 'svg', 'gif'];
            $extension =  $request->new_image->extension();
            $validate =  $this->file_validate($allowed, $extension);
            
            if($validate === true){
                $filename = "profile_".auth()->user()->id.".".$extension;
                $save =  $this->file_save('public/picture', $request->file('new_image'), $filename);
                $file_url = asset("storage/picture/".$filename);

                $user =  User::find(auth()->user()->id);
                $user->picture = $file_url;
                $user->save();


                return back()->with('success', 'Profile updated successfully');
            }else{
                return $validate;
            }
        }
    }

    public function personal(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'day' => 'required|int',
            'month' => 'required|regex:/^[a-z]/i',
            'year' => 'required|int',
            'state' => 'required',
            'lga' => 'nullable|regex:/^[a-z]/i',
            'postal' => 'nullable|int',
            
        ]);

        $states = array("abia","abuja","adamawa","akwa ibom" ,"anambra","bauchi","bayelsa","benue","borno","cross river","delta","ebonyi","edo","ekiti","enugu","gombe","imo","jigawa","kaduna","kano","katsina","kebbi","kogi","kwara","lagos","nasarawa","niger","ogun","ondo","osun","oyo","plateau","rivers","sokoto","taraba","yobe","zamfara");

        if(!in_array(strtolower($request->state), $states)){
            return back()->with('error', 'Your given state is not a valid nigerian state. Please input your state without appending state to it');
        }

        $calenderMonths = ['january' => '01', 'february' => '02', 'march' => '03', 'april' => '04', 'may'=> '05', 'june' => '06', 'july' => '07', 'august' => '08', 'september' => '09', 'october' => '10', 'november' => '11', 'december' => '12'];

        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->dob = $request->year."-".$calenderMonths[$request->month]."-".$request->day;
        $user->state = $request->state;
        $user->lga = $request->lga;
        $user->postal_code = $request->postal;
        $user->save();

        return back()->with('success', 'Personal Details updated successfully');
    }

    public function password(Request $request){

        if(empty($request->current_password) || empty($request->new_password) || empty($request->confirm_password)){
            return back()->with('error', 'Please fill out all fields');
        }elseif(!Hash::check($request->current_password, session()->get('password_hash_web'))){
            return back()->with('error', 'Your old password input is incorrect. If forgotten, you can create a ticket and get help from the support team');
        }elseif(strlen($request->new_password) < 8){
            return back()->with('error', 'Your new password must be more than or equal to 8 characters');
        }elseif(preg_match("/^[a-z]*$/i", $request->new_password)){
            return back()->with('error', 'Your password must contain atleat one special character');
        }elseif($request->new_password == $request->current_password){
            return back()->with('error', 'You cannot use your previous password');
        }elseif($request->new_password != $request->confirm_password){
            return back()->with('error', 'Your new passwords do not match.');
        }else{
            $user = User::find(auth()->user()->id);

            $user->forceFill([
                'password' => Hash::make($request->new_password)
            ])->save();

            $user->setRememberToken(Str::random(60));

            return back()->with('success', 'Password updated successfully');
        }
    }

    public function preference(Request $request){

        $user = User::find(auth()->user()->id);
        $user->email_preference = $request->preference;
        $user->save();

        return back()->with('success', 'Email preferences updated successfully');
    }

    public function sendEmailVerify(){
        
    }


    public function sessionsLogout(){
        return "connected";
    }

    public function delete(){
        $profile_img_name = explode("/", auth()->user()->picture);
        $profile_img_name = $profile_img_name[count($profile_img_name) - 1];

        if(strtolower($profile_img_name) == 'profile.svg'){
            $submits = $this->deleteFiles();

            if($submits == true){
                $users = Submit::where('user_id', auth()->user()->id)->get();

                foreach($users as $user){
                    $assigns = Submit::find($user['id']);
                    $assigns->delete();
                }

                $users = Tickets::where('user_id', auth()->user()->id)->get();

                foreach($users as $user){
                    $tickets = Tickets::find($user['id']);
                    $tickets->delete();
                }

                $users = Ticket_reply::where('user_id', auth()->user()->id)->get();

                foreach($users as $user){
                    $tickets = Ticket_reply::find($user['id']);
                    $tickets->delete();
                }

                $id = auth()->user()->id;

                $users = User::find(auth()->user()->id);
                $users->delete();

                return back();
            }
        }else{
            if(Storage::exists("public/picture/".$profile_img_name)){
                if(Storage::delete("public/picture/".$profile_img_name)){
                    $submits = $this->deleteFiles();

                    if($submits == true){
                        $users = Submit::where('user_id', auth()->user()->id)->get();

                        foreach($users as $user){
                            $assigns = Submit::find($user['id']);
                            $assigns->delete();
                        }
        
                        $users = Tickets::where('user_id', auth()->user()->id)->get();
        
                        foreach($users as $user){
                            $tickets = Tickets::find($user['id']);
                            $tickets->delete();
                        }
        
                        $users = Ticket_reply::where('user_id', auth()->user()->id)->get();
        
                        foreach($users as $user){
                            $tickets = Ticket_reply::find($user['id']);
                            $tickets->delete();
                        }
        
                        $id = auth()->user()->id;
        
                        $users = User::find(auth()->user()->id);
                        $users->delete();
        
                        return back();
                    }
                }
            }else{
                $users = Submit::where('user_id', auth()->user()->id)->get();

                foreach($users as $user){
                    $assigns = Submit::find($user['id']);
                    $assigns->delete();
                }

                $users = Tickets::where('user_id', auth()->user()->id)->get();

                foreach($users as $user){
                    $tickets = Tickets::find($user['id']);
                    $tickets->delete();
                }

                $users = Ticket_reply::where('user_id', auth()->user()->id)->get();

                foreach($users as $user){
                    $tickets = Ticket_reply::find($user['id']);
                    $tickets->delete();
                }

                $id = auth()->user()->id;

                $users = User::find(auth()->user()->id);
                $users->delete();

                return back();
            }
        }


        // return $profile_img_name;
    }

    public function deleteFiles(){
        $users = Submit::where('user_id', auth()->user()->id)->get();

        if(count($users) == 0){
            return true;
        }else{
           foreach($users as $user){
               if(Storage::exists("assignments/".$this->explode($user['file_url']))){
                   Storage::disk('local')->delete("assignments/".$this->explode($user['file_url']));
               }
           }
        }

        return true;
    }

    public function explode($name){
        $new_name = explode("/", $name);
        $new_name = $new_name[count($new_name) - 1];

        return $new_name;
    }


}
