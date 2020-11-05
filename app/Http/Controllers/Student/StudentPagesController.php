<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Courses;
use App\Models\Submit;
use App\Http\Traits\StudentTraits;
use App\Models\Assignments;
use App\Http\Traits\GeneralTraits;
use Illuminate\Support\Facades\Storage;

class StudentPagesController extends Controller{
    use StudentTraits, GeneralTraits;

    public function home(){
        return view('student.index');
    }


    //assignments methods
    public function assignments(){
        $this->getUserInfo();
        $user_courses = session()->get('user_courses');
        $assignments = json_decode(Assignments::where('level', auth()->user()->level)->latest()->get(), true);
        $user_assignment = [];

        foreach($assignments as $assignment){
            if(in_array($assignment['course'], $user_courses)){
                $user_assignment[] = $assignment;
            }
        }

        $status = array('submitted' => $this->submitted(), 'unsubmitted' => $this->unsubmitted());
        return view('student.assignments.show', ['assignments' => $user_assignment])->with('status', $status);
    }


    public function submit_show(){
        $status = array('submitted' => $this->submitted(), 'unsubmitted' => $this->unsubmitted(), 'status' => 'submit'); 

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $assignment = Assignments::findOrFail($id);

            return view('student.assignments.submit', ['status' => $status])->with('assignment',$assignment);
        }else{
            return view('student.assignments.submit', ['status' => $status]);
        }
    }

    public function single($status){
        $valid_status = array('new', 'unsubmitted', 'submitted');
        $stat = $status;
        $status = array('submitted' => $this->submitted(), 'unsubmitted' => $this->unsubmitted(), 'status' => $status);

        if(!in_array($stat, $valid_status)){
            $assignment = Assignments::findOrFail($stat);

            // return $assignment;
            return view('student.assignments.single', ['status' => $status])->with('assignment', $assignment); 
        }else{
            if($stat == $valid_status[1]){

                $unsubmitted = $this->unsubmitted();
                return view('student.assignments.new', ['assignments' => $unsubmitted])->with('status', $status); 

            }elseif($stat == $valid_status[2]){ 

                return view('student.assignments.new', ['assignments' => $this->user_submitted()])->with('status', $status); 
                
            }else{
                $status = array('submitted' => $this->submitted(), 'unsubmitted' => $this->unsubmitted(), 'status' => $status); 
                return view('student.assignments.single', ['status' => $status]); 
            }
        }
    }


    public function assign_submit(Request $request){
        $validated = $request->validate([
            'id' => 'required|exists:Assignments,id',
            'course' => 'required',
            'assign_file' => 'required',
        ]);

        $allowed = explode(",",$request->allowed);
        $file_check = $this->file_validate($allowed, $request->assign_file->extension());
        $filename = $request->id."_".auth()->user()->username.".".$request->assign_file->extension();

        if($file_check === true){
            $path = $this->file_save('assignments', $request->assign_file, $filename);

            $submit = new Submit();
            $submit->assignment_id = $request->id;
            $submit->user_id = auth()->user()->id;
            $submit->course = $request->course;
            $submit->short_note = $request->note;
            $submit->file_url = $path;
            $submit->due = false;
            $submit->save();

            return back()->with('success', 'Assignment Submitted successfully');
        }else{
            return $file_check;
        }
    }

    public function download($filename){
        if(Storage::exists("assignments/".$filename)){
            return Storage::download("assignments/".$filename);
        }
    }
















    public function register_course(){
        $courses = Courses::where('level', auth()->user()->level)->get()[0];
        $this->getUserInfo();
        $status = array('submitted' => $this->submitted(), 'unsubmitted' => $this->unsubmitted(), 'status' => 'new'); 
        return view('student.courses.register', ['courses' => $courses])->with('status', $status);
    }

    public function course_update(Request $request){
        return $this->update_courses($request);
    }



    public function test(){
        // $assign = Assignments::find(5);
        // $assign->level = '100';
        // $assign->course = 'hst101';
        // $assign->lecturer = 'pius karim';
        // $assign->title = 'part of speech';
        // $assign->allowed = ['png','jpeg', 'jpg','doc','pdf','mp4'];
        // $assign->filename = 'http://maraine.com/storage/picture/profile.svg';
        // $assign->submission_date = '2020-12-18';
        // $assign->short_note = ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum delectus pariatur ut eos nisi sapiente consequatur aspernatur veniam ratione, id veritatis aliquam eaque sunt minus nobis, in ipsum dolores vitae, eius atque? Eius inventore fugit error ex impedit incidunt delectus ratione asperiores optio assumenda. Dolore, velit nihil? Iusto, blanditiis reprehenderit?';

        // $assign->save();
        // return Assignments::where('level', '100')->get();
        return session()->all();
        // return $this->unsubmitted();
    }

}