<?php

    namespace App\Http\Traits;
    use Illuminate\Http\Request;
    use App\Models\User;
    use App\Events\NewUser;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Auth\Events\Registered;

    trait RegisterTraits{

        private $states = array("abia","abuja","adamawa","akwa ibom" ,"anambra","bauchi","bayelsa","benue","borno","cross river","delta","ebonyi","edo","ekiti","enugu","gombe","imo","jigawa","kaduna","kano","katsina","kebbi","kogi","kwara","lagos","nasarawa","niger","ogun","ondo","osun","oyo","plateau","rivers","sokoto","taraba","yobe","zamfara");

        public function checkInputs($request){
            $name = $request->name;
            $username = $request->username;
            $email = $request->email;
            $phone = $request->phone;
            $state = $request->state;
            $dob = $request->dob;
            $password = $request->password;
            $password_confirmation = $request->password_confirmation;
            $remember = $request->remember;

            $checkAge = $this->checkAge($dob);

            if( empty($name) ||  empty($username) ||  empty($email) ||  empty($state) ||  empty($dob) ||  empty($password) ||  empty($password_confirmation)){
                return back()->withInput()->with('error', 'Please fill out all fields');
            }elseif(!preg_match("/^[a-zA-Z _-]*$/", $name)){
                return back()->withInput()->with('error', 'Your name input is invalid ( It should only contain alphabets)');
            }elseif(!preg_match("/^[a-zA-Z0-9_]*$/", $username)){
                return back()->withInput()->with('error', 'Your username input is invalid ( It should only contain Alpha-numeric characters)');
            }elseif(!preg_match("/^[0-9]*$/", $phone)){
                return back()->withInput()->with('error', 'Your Provided Phone Number is invalid ( E.g 08145634567)');
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return back()->withInput()->with('error', 'Your email input is invalid');
            }elseif($checkAge === false){
                return back()->withInput()->with('error', 'Your must be above 18 to continue');
            }elseif(strlen($password) < 8){
                return back()->withInput()->with('error', 'Your password characters must be more than 8');
            }elseif(preg_match("/^[a-zA-Z0-9]*$/", $password)){
                return back()->withInput()->with('error', 'Your password must contain special characters');
            }elseif($password_confirmation != $password){
                return back()->withInput()->with('error', 'Your passwords does not match');
            }elseif(count(User::where('username', $username)->get()) > 0){
                return back()->withInput()->with('error', 'Username has been used. Please try another username to continue');
            }elseif(count(User::where('email', $email)->get()) > 0 ){
                return back()->withInput()->with('error', 'Email has been used. Please try another email to continue');
            }elseif(count(User::where('phone', $phone)->get()) > 0){
                return back()->withInput()->with('error', 'Phone number has been used');
            }else{
                $user = $this->save($request);
                // $user = User::where('name', $name)->get();

                if($user === false){
                    return back()->withInput()->with('error', 'Opps! An error occured. Please try again');
                }else{
                    
                    event(new NewUser($user));
                    event(new Registered($user));
                    if($remember == 'on'){
                        Auth::login($user,true);
                    }else{
                        Auth::login($user);
                    }

                    return redirect()->intended(Auth::user()->role."/")->with('success', 'Successful. A verification email has been sent to your email address. Please verify your identity');
                }
            }
        }

        public function checkAge($date){
            $break = explode("-",$date);
            $year = $break[0];
            $subYear =getdate()['year'] - $year;

            if($subYear < 18){
                return false;
            }elseif($subYear >= 18){
                return true;
            }
        }

        public function regGenerator(){

            function regGenerator(){
                $constant = getdate()['year'].getdate()['yday'];
                $num = "0123456789";
                $shuffle = substr(str_shuffle($num), 0, 4);
                $reg_num = $constant.$shuffle;
                $checkUsers = User::where('reg_no', $reg_num)->get();

                while(count($checkUsers) > 0){
                    $shuffle = substr(str_shuffle($num), 0, 4);
                    $reg_num = $constant.$shuffle;
                }

                return $reg_num;
            }

            return regGenerator();
        }

        public function save($request){
            $name = $request->name;
            $username = $request->username;
            $email = $request->email;
            $phone = $request->phone;
            $state = $request->state;
            $reg_no = $this->regGenerator();
            $dob = $request->dob;
            $password = $request->password;
            $picture = asset('storage/picture/profile.svg');
            $role = 'student';
            $email_preference = array('security', 'update', 'products');

            $user = new User();
            $user->name = $name;
            $user->username = $username;
            $user->email = $email;
            $user->phone = $phone;
            $user->state = $state;
            $user->level = 100;
            $user->email_preference = $email_preference;
            $user->reg_no = $reg_no;
            $user->dob = $dob;
            $user->picture = $picture;
            $user->role = $role;
            $user->password = Hash::make($password);

            if($user->save()){
                return $user;
            }else{
                return false;
            }


        }
    }