@extends('layouts.app')
@section('customCss')
    <link rel="stylesheet" href="{{asset("./css/users.css")}}">
@endsection

@section('content')

@if($submit)
<style>
    body{
        color: darkblue!important;
    }
</style>
<section class="container capitalize p-1 fade">
    <div class="flex-center card align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"/></svg>
        <p class="md bold ml-1 center" style="color: darkblue;">Assignments Submitted by {{$user['username']}}</p>
    </div>


    <div class="rounded bg-white shadow-ts mx-1 p-1">
        <p class="md bold center container">Assignment Id: {{$submit['id']}}</p>

        <ul>
            <li class="mx-1 pl-1 pr-1">Course: {{$submit['course']}}</li>
            <li class="mx-1 pl-1 pr-1">Student Name: {{$user['name']}}</li>
            <li class="mx-1 pl-1 pr-1">Student Level: {{$user['level']}}</li>
            <li class="mx-1 pl-1 pr-1">Submitted Date: {{$user['created_at']}}</li>
            <li class="mx-1 pl-1 pr-1">Short Note: <br>{{$submit['short_note']}}</li>

            <div class="p-button">
                <a href="{{route('admin.assignments.download', explode("/", $submit['file_url'])[3])}}" class="bg-primary button button-primary rounded shadow-ts" style="padding: 10px;">Download Submission File</a>                
            </div>

        </ul>
    </div>

</section>
@else 
<p class="md bg-white bold center shadow-ts container mt-1 rounded p-1 message-danger">Opps! Nothing to show</p>
@endif



@endsection