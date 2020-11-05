<?php

namespace App\Http\Traits;
use App\Models\Tickets;


trait AdminTraits{

    public function TicketsFilter($param,$check){
        $tickets = Tickets::orderBy('urgency', 'asc')->cursor()->filter(function($ticket) use($check, $param){
            return $ticket->$check == $param;
        });

        $arr = [];

        foreach($tickets as $ticket){
            $arr[] = $ticket;
        }

        return $arr;
    }
}