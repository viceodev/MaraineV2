@extends('layouts.app')

@section('content')
    <section class="container-full flex-between p-4 bg-light shadow">

        <div>
            <img class="shadow rounded" src="./img/science.png" alt="">
        </div>


        <div>
            <img class="shadow rounded" src="./img/science.png" alt="">
        </div>

        <div>
            <img class="shadow rounded" src="./img/science.png" alt="">
        </div>

        
    </section>
    
    <div class="message message-success">
        <span>User registered successfully</span>
    </div>
   
    <a href="{{route('login')}}"><button type="submit" id="modal-opener" class="button-primary">Click Me</button></a>

@endsection