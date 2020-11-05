@extends('student.tickets.index')

@section('customBody')
<style>
    div.messager{
        padding: 10px 0px!important;
    }

    div.message-success svg{
        fill: #217243!important;
    }

    div.message-info svg{
        fill: #009!important;
    }
</style>

<section class="submit">
    @if($status['ticket']['is_active'] != 0)
    <form action="{{route('student.tickets.delete', $status['ticket']['id'])}}" method="POST">
        @csrf 
        @method('delete')
        <div class="p-button">
            <button type="submit" class="button button-primary">Close Ticket</button>
        </div>
    </form>
    @endif 

    
    @if($status['ticket']['is_active'] == 1)
    <meta id="page" content="active">
    <div class="card message-danger sm fade mx-1 flex-around align-items-center">
        <span class="mr-1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"/></svg>
        </span>
        Please make sure you close tickets that has been resolved for better ticket handling
    </div>

    <div class="card message-danger sm fade mx-1 flex-center align-items-center">
        <span class="mr-1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"/></svg>
        </span>
        Active
    </div>


    @elseif($status['ticket']['is_active'] == 0)
    <meta id="page" content="resolved">

    <div class="card message-success messager sm fade mx-1 flex-center align-items-center">
        <span class="mr-1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"/></svg>
        </span>
        Resolved
    </div> 

    @elseif($status['ticket']['is_active'] == 2)
    <meta id="page" content="pending">

    <div class="card message-info messager sm fade mx-1 flex-center align-items-center">
        <span class="mr-1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"/></svg>
        </span>
        Please make sure you close tickets that has been resolved for better ticket handling
    </div>

    <div class="card message-info messager sm fade mx-1 flex-center align-items-center">
        <span class="mr-1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"/></svg>
        </span>
        Pending
    </div>

    @endif
    <section class="initial card mx-1">
            
            <div class="ticket-header">
                <img src="{{Auth::user()->picture}}" alt="{{Auth::user()->name}}">
                <h1>Subject: {{$status['ticket']['subject']}}</h1>
                <p class="sm">Submitted <small>{{$status['ticket']['created_at']}}</small> || Your Message :</p>
            </div>
                <p class="sm p-1 code"> 
                    {{$status['ticket']['message']}}
                </p>   

            @if($status['ticket']['filename'] != null)
                <p class="sm p-1 code">Attached File: <a href="{{asset("/storage/tickets/".$status['ticket']['filename'])}}" download=""><u>Download File</u></a></p>
            @endif
           
    </section>

@if(count($status['replies']) > 0)
@foreach($status['replies'] as $reply)

@if($reply['position'] == 'admin')
    <section class="reply card mx-1">
        <div class="ticket-header">
            <img src="{{Auth::user()->picture}}" alt="{{Auth::user()->name}}">
            <h1>Support Team reply</h1>
            <p class="sm">Submitted <small>02-05-2020</small> || Admin Reply :</p>
        </div>
            <p class="sm p-1 code">
                
                {{-- message --}}
                {{$reply['message']}}

                @if($reply['file_url'] != null)
                    <p class="sm p-1 code">Attached File: <a href="{{asset("/storage/tickets/".$reply['file_url'])}}" download=""><u>Download File</u></a></p>
                @endif
            </p>
            <p class="sm p-1 code">
                 <br><br><br>
                Best Regards<br>
                Victor<br>
                Maraine Support Team
            </p>
    </section>

@endif

@if($reply['position'] == 'student')
    <section class="user card mx-1">

        <div class="ticket-header">
            <img src="{{Auth::user()->picture}}" alt="{{Auth::user()->username}}">
            <h1>Your Reply</h1>
            <p class="sm">Submitted <small>{{$reply['created_at']}}</small> || Your Reply</p>
        </div>

            <p class="sm p-1 code">
                {{$reply['message']}}
            </p>    

            @if($reply['file_url'] != null)
                <p class="sm p-1 code">Attached File: <a href="{{asset("/storage/tickets/".$reply['file_url'])}}" download=""><u>Download File</u></a></p>
            @endif
    </section>
@endif
@endforeach
    @endif

    @if($status['ticket']['is_active'] != 0)
    <section class="reply card mx-1">
        <div class="ticket-header">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M8.309 189.836L184.313 37.851C199.719 24.546 224 35.347 224 56.015v80.053c160.629 1.839 288 34.032 288 186.258 0 61.441-39.581 122.309-83.333 154.132-13.653 9.931-33.111-2.533-28.077-18.631 45.344-145.012-21.507-183.51-176.59-185.742V360c0 20.7-24.3 31.453-39.687 18.164l-176.004-152c-11.071-9.562-11.086-26.753 0-36.328z"/></svg>

            <h1>Reply Admin</h1><br>
        </div>

        <form method="POST"  action="{{route('student.tickets.update')}}" class="p-1" enctype="multipart/form-data">
            @csrf 
        <label for="">Type here to reply</label>
        <textarea name="message" placeholder="Type here to reply......." class="shadow-ts p-1 card"></textarea><br>
        <input type="hidden" name="id" value= "{{$status['ticket']['id']}}">
        <input type="hidden" name="is_active" value= "{{$status['ticket']['is_active']}}">


        <div>

            <span>
                <label for="">Upload file here if neccessary</label>
                <input type="file" name="file" class="card"><br>
            </span>          
            
            <i>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"/></svg>
            </i>
        </div>


        <div class="p-button">
           <button type="submit" name="submit" class="button-primary">Submit</button> 
        </div>
        
        </form>
    </section>
    @endif
</section>

@endsection