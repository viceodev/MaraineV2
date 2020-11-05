@extends('student.tickets.index')

@section('customBody')

<section class="list">
<meta  content="show" id="page">
<style>
    div.card.sm.fade svg{
        width: 30px;
        fill: #981814;
    }
</style>
@if(count($tickets) > 0 )
@foreach ($tickets as $ticket)
    
<a href="{{route('student.tickets.status', $ticket['id'])}}">
    <ul class="flex-between assign">
        <li class="name">{{$ticket['related']}}</li>
        <li class="li-title">{{$ticket['subject']}}</li>
        <li class="date">{{$ticket['created_at']}}</li>
        @if($ticket['is_active'] == 1)
        <li class="message-danger">Active</li>
        @elseif($ticket['is_active'] == 0)
        <li class="message-success">Resolved</li>

        @elseif($ticket['is_active'] == 2)
        <li class="message-info">Pending</li>

        @endif
    </ul> 
</a>

@endforeach

@else
<div class="card message-danger sm fade mx-1 flex-center align-items-center">
    <span class="mr-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"/></svg>
    </span>
    <p class="md bold">Opps! Nothing to show</p>
</div> 
@endif
</section>
@endsection