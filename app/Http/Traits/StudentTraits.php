<?php

namespace App\Http\Traits;

use App\Models\Courses;
use App\Models\User;
use App\Models\Submit;
use App\Models\Assignments;
use App\Models\Tickets;
use App\Http\Traits\GeneralTraits;

trait StudentTraits{

    use GeneralTraits;
    public function update_courses($request){

        if($request->main && $request->optional && $request->language){
            if(count($request->main) != 5){
                return back()->with('error', 'You must have all compulsory courses selected');
            }elseif( count($request->optional) !=1 ){
                return back()->with('error', 'You must have 2 optional courses selected');
            }elseif( count($request->language) != 1) {
                return back()->with('error', 'You must have  2 optional courses selected');
            } else{
                $courses = array('main' => $request->main, 'optional' => $request->optional, 'language' => $request->language);

                $user = User::find(auth()->user()->id);
                $user->courses = $courses;
                $user->save();

                return back()->with('success', 'Courses registered successfully');
            }
        }else{
            return back()->with('error', 'You must have exactly 7 selected courses. 5 Compulsory and 2 Optional');
        }
    

    }

    public function unsubmitted(){
        if(count(session()->get('user_courses')) > 0){
            $user_courses = session()->get('user_courses');
            $user_assignments = session()->get('user_assignments');
            $submitteds = $this->submitted();
            $assignments = json_decode(Assignments::where('level', auth()->user()->level)->latest()->get(), true);
            $submitted = [];
            $unsubmitteds = [];
            $unsubmitted = [];

            if(count($submitteds) > 0){
                foreach($submitteds as $submit){
                    $submitted[] = $submit['assignment_id'];
                }

                foreach($user_assignments as $assignment){
                    if(!in_array($assignment, $submitted)){
                        $unsubmitteds[] = $assignment;
                    }
                }

                foreach($unsubmitteds as $unsubmit){
                    $unsubmitted[] = json_decode(Assignments::find($unsubmit),true);
                }
            }else{
                $unsubmitted = $assignments;
            }
        }else{
            $unsubmitted = [];
        }

        return $unsubmitted;
    }

    public function submitted(){
        return json_decode(Submit::where('user_id', auth()->user()->id)->get(), true);
    }

    public function user_submitted(){
        $submits = json_decode(Submit::where('user_id', auth()->user()->id)->get(), true);
        $submitted = [];
        $submitteds = [];
        

        foreach($submits as $submit){
            $submitted[] = $submit['assignment_id'];
        }


        foreach($submitted as $submit){
            $submitteds[] = Assignments::find($submit); 
        }

        return $submitteds;
    }

    public function getUserInfo(){
        if(auth()->user()->courses != null){
            $courses = json_decode(auth()->user()->courses, true);
            $user_courses = array_merge($courses['main'],$courses['optional'],$courses['language']);   
        
            $assignments = json_decode(Assignments::where('level', auth()->user()->level)->latest()->get(), true);
            $assignment_id = [];

            foreach($assignments as $assignment){
                if(in_array($assignment['course'], $user_courses)){
                    $assignment_id[] = $assignment['id'];
                }
            }

            session(['user_courses'=> $user_courses]);
            session(['user_assignments' => $assignment_id]);
        }else{
            session(['user_courses'=> []]);
            session(['user_assignments' => []]);
        }

    }

    public function file_validate(array $allowed,$extension){
        $extensions = "";

        foreach($allowed as $ext){
            $extensions .= ".".$ext.",&nbsp;";
        }

        $string = '<p class="sm">Your file type is not allowed <br> You can only upload <br> [ '.$extensions.' ]</p>';

        if(!in_array($extension, $allowed)){
            return back()->withInput()->with("error", $string);
        }else{
            return true;
        }
    }


    public function validate_ticket($request){
        $subject = $request->subject;
        $related = $request->related;
        $urgency = strtolower($request->urgency);
        $file = $request->file('file');
        $message = $request->message;
        $allowed = ['png', 'jpeg', 'jpg', 'gif'];
        


        if(empty($subject) || empty($related) || empty($urgency) || empty($message)){
            return back()->withInput()->with('error', 'Please fill out all necessary fields');
        }elseif($file){

            if(in_array($file->extension(), $allowed)){
                $filename = auth()->user()->id."_".mt_rand(5,100000).".".$file->extension();
                $this->file_save('public/tickets', $file, $filename);
            }else{
                return back()->with('error', 'File type not allowed');
            }
        }

        if($urgency == 'high'){
            $urgency = 1;
        }elseif($urgency == 'medium'){
            $urgency = 2;
        }elseif($urgency == 'low'){
            $urgency = 3;
        }



        if($file){
            return $this->ticket_submitter($subject, $related, $urgency, $message, $filename);
        }else{
            return $this->ticket_submitter($subject, $related, $urgency, $message, null);
        }
    }

    public function ticket_submitter($subject, $related, $urgency, $message, $filename){
        $ticket =  new Tickets();
        $ticket->user_id = auth()->user()->id;
        $ticket->subject = $subject;
        $ticket->related = $related;
        $ticket->urgency = $urgency;
        $ticket->message = $message;
        $ticket->is_active = true;
        $ticket->filename = $filename;
        $ticket->save();

        return back()->with('success', 'Ticket submitted successfully, you would get a reply as soon as possible');

    }


    public function retrieve_tickets($status,$property){

        $tickets = Tickets::where('user_id', auth()->user()->id)->cursor()->filter(function($ticket) use($status,$property){
            return $ticket->$property == $status;
        });

        return $tickets;
    }
}