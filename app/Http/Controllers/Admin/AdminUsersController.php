<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Courses;
use App\Models\Submit;
use App\Models\Ticket_reply;
use App\Models\Tickets;
use Illuminate\Support\Facades\Storage;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::orderBy('level', 'asc')->get();
        return view('admin.users.index', ['courses' => $courses]);
        // return $courses;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $results = User::where('level', $id)->cursor()->filter(function($user){
            return $user->role == 'student';
        });
        $users = [];

        foreach($results as $result){
            $users[] = $result;
        }

        return view('admin.users.show', ['users' => $users])->with('level', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.single', ['user' => $user]);
    }

    public function allSubmits($id){
        $submits = Submit::where('user_id', $id)->get();
        $user = User::findOrFail($id);

        return view('admin.submissions.index', ['submits' => $submits])->with('user', $user);
    }

    public function singleSubmits($id){
        $submits = Submit::findOrFail($id);

        if($submits){
            $user = User::findOrFail($submits['user_id']);
        }
        
        return view('admin.submissions.userSingle', ['submit' => $submits])->with('user', $user);
    }

    

    public function ban(Request $request){
        $user = User::findOrFail($request->id);
        $user->banned = $request->action;
        $user->save();

        return back()->with('success', 'User details update successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $profile_img_name = explode("/", $user->picture);
        $profile_img_name = $profile_img_name[count($profile_img_name) - 1];

        if(strtolower($profile_img_name) == 'profile.svg'){
            $submits = $this->deleteFiles($user);

            if($submits == true){
                $users = Submit::where('user_id', $user->id)->get();

                foreach($users as $user){
                    $assigns = Submit::find($user['id']);
                    $assigns->delete();
                }

                $users = Tickets::where('user_id', $user->id)->get();

                foreach($users as $user){
                    $tickets = Tickets::find($user['id']);
                    $tickets->delete();
                }

                $users = Ticket_reply::where('user_id', $user->id)->get();

                foreach($users as $user){
                    $tickets = Ticket_reply::find($user['id']);
                    $tickets->delete();
                }

                $user->delete();

                return back();
            }
        }else{
            if(Storage::exists("public/picture/".$profile_img_name)){
                if(Storage::delete("public/picture/".$profile_img_name)){
                    $submits = $this->deleteFiles($user);

                    if($submits == true){
                        $users = Submit::where('user_id', $user->id)->get();

                        foreach($users as $user){
                            $assigns = Submit::find($user['id']);
                            $assigns->delete();
                        }
        
                        $users = Tickets::where('user_id', $user->id)->get();
        
                        foreach($users as $user){
                            $tickets = Tickets::find($user['id']);
                            $tickets->delete();
                        }
        
                        $users = Ticket_reply::where('user_id', $user->id)->get();
        
                        foreach($users as $user){
                            $tickets = Ticket_reply::find($user['id']);
                            $tickets->delete();
                        }
        
                        $user->delete();
        
                        return back();
                    }
                }
            }else{
                $users = Submit::where('user_id', $user->id)->get();

                foreach($users as $user){
                    $assigns = Submit::find($user['id']);
                    $assigns->delete();
                }

                $users = Tickets::where('user_id', $user->id)->get();

                foreach($users as $user){
                    $tickets = Tickets::find($user['id']);
                    $tickets->delete();
                }

                $users = Ticket_reply::where('user_id', $user->id)->get();

                foreach($users as $user){
                    $tickets = Ticket_reply::find($user['id']);
                    $tickets->delete();
                }
                
                $user->delete();

                return back();
            }
        }


        // return $profile_img_name;
    }

    public function deleteFiles($user){
        $users = Submit::where('user_id', $user->id)->get();

        if(count($users) == 0){
            return true;
        }else{
           foreach($users as $user){
               if(Storage::exists("assignments/".$this->explode($user['file_url']))){
                   Storage::disk('local')->delete("assignments/".$this->explode($user['file_url']));
               }
           }
        }

        $tickets = Tickets::where('user_id', $user->id)->get();

        if(count($tickets) == 0){
            return true;
        }else{
           foreach($tickets as $ticket){
               if(Storage::exists("public/tickets/".$this->explode($ticket['filename']))){
                   Storage::disk('local')->delete("public/tickets/".$this->explode($ticket['filename']));
               }
           }
        }

        $tickets = Ticket_reply::where('user_id', $user->id)->get();

        if(count($tickets) == 0){
            return true;
        }else{
           foreach($tickets as $ticket){
               if(Storage::exists("public/tickets/".$this->explode($user['filename']))){
                   Storage::disk('local')->delete("public/tickets/".$this->explode($user['filename']));
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
