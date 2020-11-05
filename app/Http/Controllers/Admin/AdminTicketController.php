<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tickets;
use App\Models\Ticket_reply;
use App\Http\Traits\AdminTraits;
use App\Http\Traits\GeneralTraits;
use Illuminate\Support\Facades\Storage;

class AdminTicketController extends Controller
{
    use AdminTraits, GeneralTraits;

    public function getInfo($status){
        $all = Tickets::orderBy('urgency', 'asc')->get();
        $active = $this->TicketsFilter(1,'is_active');
        $pending = $this->TicketsFilter(2,'is_active');
        $resolved = $this->TicketsFilter(0,'is_active');

        $info = ['all' => $all, 'active' => $active, 'pending' => $pending, 'resolved' => $resolved, 'status' => $status];

        return $info;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = $this->getInfo('show');
        // return $status;
        return view('admin.tickets.show', ['status' => $status]);
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

        if(!empty($request->customer_reply)){
            if($request->file('file') != null){
               $filename = $request->id."_admin_ticket.".$request->file('file')->extension(); 
               $this->file_save("public/tickets", $request->file('file'),$filename);
            }else{
                $filename = null;
            }
            
            $user = new Ticket_reply();
            $user->user_id = auth()->user()->id;
            $user->ticket_id = $request->id;
            $user->message = $request->customer_reply;
            $user->position = 'admin';
            $user->is_active = $request->active;
            $user->file_url = $filename;
            $user->save();            
        }

        $user = Tickets::find($request->id);
        $user->is_active = $request->active;
        $user->save();

        // return $filename;
        return back()->with('success', 'Ticket updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $valid_status = ['active', 'pending', 'resolved'];

        if(!in_array(strtolower($id), $valid_status)){
            $reply = Ticket_reply::where('ticket_id', $id)->get();
            $status = $this->getInfo('single');
            $status['id'] = $id;
            $status['replies'] = $reply;

            return view('admin.tickets.single', ['status' => $status]);
        }else{
            $status = $this->getInfo($id);
            return view('admin.tickets.active', ['status' => $status]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $ticket = Tickets::find($id);
        Storage::delete("public/tickets/".$ticket['filename']);
        $ticket->delete();

        $tickets = Ticket_reply::where('ticket_id', $id)->get();

        foreach($tickets as $ticket){
            Storage::delete("public/tickets/".$ticket['filename']);
            $ticket->delete();
        }

        return redirect()->route('admin.tickets')->with('success', 'Ticket Deleted successfully');
    }
}
