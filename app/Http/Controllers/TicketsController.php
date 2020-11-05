<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\StudentTraits;
use App\Models\Tickets;
use App\Models\Ticket_reply;
use App\Http\Traits\GeneralTraits;

class TicketsController extends Controller
{
    use StudentTraits,GeneralTraits;
    private $active;
    private $pending;
    private $resolved;

    public function contruct($status){
        $arr = [];

        $arr['active'] = $this->iterate(1);
        $arr['pending'] = $this->iterate(2);
        $arr['resolved'] = $this->iterate(0);
        $arr['status'] = $status;

        return $arr;
    }

    public function iterate($param){
        $elements = $this->retrieve_tickets($param, "is_active");
        $arr = [];

        foreach($elements as $element){
            $arr[] = $element; 
        }

        return $arr;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = $this->contruct('show');
        $tickets = Tickets::where('user_id', auth()->user()->id)->get();
        return view('student.tickets.show', ['tickets' => $tickets])->with('status', $status);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = $this->contruct('new');
        return view('student.tickets.new', ['status' => $status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate_ticket($request);

        return $validated;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $valid_status = array('active', 'pending', 'resolved');
        $status = $this->contruct($id);


        if(!in_array($id, $valid_status)){
            return $this->edit($id, $status);
        }else{            
            return view('student.tickets.active', ['status' => $status]);         
        }

        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $status)
    {
        $tickets = Tickets::findOrFail($id)->where('user_id', auth()->user()->id)->get();

        foreach($tickets as $ticket){
            if($ticket['id'] == $id){
                $status['ticket'] = $ticket;
            }
        }

        $tickets = Ticket_reply::where('ticket_id', $id)->get();
        $status['replies'] = $tickets;

        return view('student.tickets.single', ['status' => $status]);
        // return $status;        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validate = $request->validate([
            'message' => 'required',
        ]);

        if($request->file('file') != null){
            $allowed = array('png','jpg','jpeg','svg','doc');

            if(!in_array($request->file('file')->extension(), $allowed)){
                return back()->with('error', 'File type not allowed');
            }else{
                $filename = $request->id."_student_".mt_rand(5,100000).".".$request->file('file')->extension();
                $this->file_save('public/tickets', $request->file('file'), $filename);   
                $ticket = new Ticket_reply();
                $ticket->user_id = auth()->user()->id;
                $ticket->ticket_id = $request->id;
                $ticket->message = $request->message;
                $ticket->position = 'student';
                $ticket->is_active = $request->is_active;
                $ticket->file_url = $filename;
                $ticket->save();              
            }

        }else{
            $filename = null;
            $ticket = new Ticket_reply();
            $ticket->user_id = auth()->user()->id;
            $ticket->ticket_id = $request->id;
            $ticket->message = $request->message;
            $ticket->position = 'student';
            $ticket->is_active = $request->is_active;
            $ticket->file_url = $filename;
            $ticket->save();            
        }

        
        return back()->with('success', 'Ticket updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Tickets::find($id);
        $ticket->is_active = 0;
        $ticket->save();
        // return $ticket;

        return back()->with('success', 'Ticket updated successfully');
    }
}
