<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Assignments;
use App\Models\Submit;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\GeneralTraits;

class AdminAssignmentsController extends Controller
{

    use GeneralTraits;
    public function info(){
        $assignments = Assignments::latest()->get();
        $submitted  = Submit::latest()->get();

        $info = ['all' => $assignments, 'submitted' => $submitted];

        return $info;
    }

    public function iterate(){
        // $assignments = Assignments::cursor()->filter(function($assignment){
        //     return $assignment->
        // });
    }

    public function download($filename){
        if(Storage::exists('assignments/'.$filename)){
            return Storage::download('assignments/'.$filename);
        }else{
            return back()->with('error','Opps! File not found');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = $this->info();
        return view('admin.assignments.show', ['status' => $status]);
        // return $status;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = $this->info();
        $status['date'] = getdate()['year']."-".getdate()['mon']."-".getdate()['mday'];
        return view('admin.assignments.create', ['status' => $status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:225',
            'course' => 'required|max:225',
            'lecturer' => 'required|max:225',
            'level' => 'required|integer',
            'submission_date' => 'required|date',
            'note' => 'nullable',
            'allowed' => 'required|array',
            'assign_file' => 'nullable|file|max:50000',
        ]);
        $allowed = ['mp3', 'pdf', 'doc', 'png', 'jpg', 'jpeg', 'mp4'];

        if($request->assign_file){
            if(!in_array($request->assign_file->extension(), $allowed)){
                return back()->withInput()->with('error', 'File type not allowed');
            }else{
                $filename = mt_rand(10,100000).str_shuffle("123456nopqrstuvwxyz").".".$request->assign_file->extension();

                while(Storage::exists('assignments/'.$filename)){
                    $filename = mt_rand(10,100000).str_shuffle("123456nopqrstuvwxyz").".".$request->assign_file->extension();
                }
                $this->file_save("assignments", $request->assign_file, $filename);
                
                return $this->storeDb($request, $filename);
            }
        }else{
            return $this->storeDb($request, null);
        }
    }

    public function storeDb($request, $filename){
        $allowed = "";
        $limit = (count($request->allowed) - 1);

        for($i=0; $i <= $limit; $i++){
            if($i != $limit){
                $allowed .= $request->allowed[$i].",";
            }else{
                $allowed .= $request->allowed[$i];
            }
        }

        $assignment = new Assignments();
        $assignment->level = $request->level;
        $assignment->course = $request->course;
        $assignment->lecturer = $request->lecturer;
        $assignment->title = $request->title;
        $assignment->allowed = $allowed;
        $assignment->filename = $filename;
        $assignment->short_note = $request->note;
        $assignment->submission_date = $request->submission_date;
        $assignment->save();
        
        return back()->with('success', 'Assignment Added Successully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = $this->info();
        $status['id'] = $id;
        return view('admin.assignments.single', ['status' => $status]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = $this->info();
        $status['id'] = $id;
        return view('admin.assignments.edit', ['status' => $status]);
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
        $request->validate([
            'course' => 'required|max:255',
            'title' => 'required|max:255',
            'submission_date' => 'required|date',
            'lecturer' => 'required|max:255',
            'allowed' => 'required|array',
            'assign_file' => 'nullable|file|max:100000',
        ]);

        $allowed = ['mp3', 'pdf', 'doc', 'png', 'jpg', 'jpeg', 'mp4'];

        if($request->assign_file){
            if(!in_array($request->file('assign_file')->extension(), $allowed)){
                return back()->with('error','File type not allowed');
            }else{
                $filename = explode(".", $request->filename)[0];
                $filename = $filename.".".$request->assign_file->extension();
                if(Storage::exists("assignments/".$request->filename)){
                    Storage::delete("assignments/".$request->filename);
                }
                $this->file_save('assignments', $request->assign_file, $filename);
                return $this->updateDb($request, $filename);
            }            
        }else{
            return $this->updateDb($request, $request->filename);
        }

    }

    public function updateDb($request,$filename){
        $allowed = "";

        for($i=0; $i < count($request->allowed); $i++){
            if($i != (count($request->allowed) - 1)){
                $allowed .= $request->allowed[$i].",";
            }else{
                $allowed .= $request->allowed[$i];
            }
        }


        $assignment = Assignments::find($request->id);
        $assignment->course = $request->course;
        $assignment->title = $request->title;
        $assignment->lecturer = $request->lecturer;
        $assignment->allowed = $allowed;
        $assignment->filename = $filename;
        $assignment->submission_date = $request->submission_date;
        $assignment->save();

        return back()->with('success', 'Assignment Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignment = Assignments::find($id);
        if(Storage::exists("assignments/".$assignment['filename'])){
            Storage::delete("assignments/".$assignment['filename']);
        }
        $assignment->delete();

        return redirect()->route('assignments.index')->with('success','Assignment deleted successfully');
    }
}
