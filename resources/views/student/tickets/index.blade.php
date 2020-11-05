@extends('layouts.app')

@section('customCss')
<link rel="stylesheet" href="{{asset('./css/tickets.css')}}">
@endsection

@section('content')


<section class="profile">

    <div class="profile-sidebar">
            <p class="box-header">My Tickets</p>

            <div class="image">
                <img src="{{Auth::user()->picture}}" alt="{{Auth::user()->name}}">

                <div class="opacity">
                    <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"/></svg></i>

                    <span>Edit</span>
                </div>
            </div>

            <form action="" method="POST" class="d-none">
                @csrf 

                <button>Delete Picture</button>
            </form>


            <div class="desktop-info d-none">
                <a href="{{route('student.tickets')}}">
                    <section>
                        <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M128 160h320v192H128V160zm400 96c0 26.51 21.49 48 48 48v96c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48v-96c26.51 0 48-21.49 48-48s-21.49-48-48-48v-96c0-26.51 21.49-48 48-48h480c26.51 0 48 21.49 48 48v96c-26.51 0-48 21.49-48 48zm-48-104c0-13.255-10.745-24-24-24H120c-13.255 0-24 10.745-24 24v208c0 13.255 10.745 24 24 24h336c13.255 0 24-10.745 24-24V152z"/></svg></i>
                        <span>{{count($status['active']) + count($status['pending']) + count($status['resolved'])}} Total </span>
                    </section>
                </a>

                <a href="{{route('student.tickets.status', 'active')}}">
                    <section>
                        <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M8.309 189.836L184.313 37.851C199.719 24.546 224 35.347 224 56.015v80.053c160.629 1.839 288 34.032 288 186.258 0 61.441-39.581 122.309-83.333 154.132-13.653 9.931-33.111-2.533-28.077-18.631 45.344-145.012-21.507-183.51-176.59-185.742V360c0 20.7-24.3 31.453-39.687 18.164l-176.004-152c-11.071-9.562-11.086-26.753 0-36.328z"/></svg></i>
                        <span>{{count($status['active'])}} Active</span>
                    </section>
                </a>

                <a href="{{route('student.tickets.status', 'pending')}}">
                    <section>
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 32C114.6 32 0 125.1 0 240c0 49.6 21.4 95 57 130.7C44.5 421.1 2.7 466 2.2 466.5c-2.2 2.3-2.8 5.7-1.5 8.7S4.8 480 8 480c66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 141.4 0 256-93.1 256-208S397.4 32 256 32z"/></svg>
                        </i>
                        <span>{{count($status['pending'])}} Pending </span>
                    </section>
                </a>

                <a href="{{route('student.tickets.status', 'resolved')}}">
                    <section>
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M64 240c0 49.6 21.4 95 57 130.7-12.6 50.3-54.3 95.2-54.8 95.8-2.2 2.3-2.8 5.7-1.5 8.7 1.3 2.9 4.1 4.8 7.3 4.8 66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 27.4 0 53.7-3.6 78.4-10L72.9 186.4c-5.6 17.1-8.9 35-8.9 53.6zm569.8 218.1l-114.4-88.4C554.6 334.1 576 289.2 576 240c0-114.9-114.6-208-256-208-65.1 0-124.2 20.1-169.4 52.7L45.5 3.4C38.5-2 28.5-.8 23 6.2L3.4 31.4c-5.4 7-4.2 17 2.8 22.4l588.4 454.7c7 5.4 17 4.2 22.5-2.8l19.6-25.3c5.4-6.8 4.1-16.9-2.9-22.3z"/></svg>
                        </i>
                        <span>{{count($status['resolved'])}} Resolved </span>
                    </section>
                </a>

            </div>


        </div>
</section>

<section class="body flex shadow-sm p-1 fade capitalize">

<section class="left"></section>

<section class="right">

    <section class="header bg-white">
        <ul class="flex align-items-center">
            <a href="{{route('student.tickets')}}">
                <li class="flex-around align-items-center">
                    <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M128 160h320v192H128V160zm400 96c0 26.51 21.49 48 48 48v96c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48v-96c26.51 0 48-21.49 48-48s-21.49-48-48-48v-96c0-26.51 21.49-48 48-48h480c26.51 0 48 21.49 48 48v96c-26.51 0-48 21.49-48 48zm-48-104c0-13.255-10.745-24-24-24H120c-13.255 0-24 10.745-24 24v208c0 13.255 10.745 24 24 24h336c13.255 0 24-10.745 24-24V152z"/></svg></i>
                    <span>All <span class="assign">Tickets</span></span>
                </li>
            </a>

            <a href="{{route('student.tickets.status', 'active')}}">
                <li class="flex-around align-items-center">
                    <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M8.309 189.836L184.313 37.851C199.719 24.546 224 35.347 224 56.015v80.053c160.629 1.839 288 34.032 288 186.258 0 61.441-39.581 122.309-83.333 154.132-13.653 9.931-33.111-2.533-28.077-18.631 45.344-145.012-21.507-183.51-176.59-185.742V360c0 20.7-24.3 31.453-39.687 18.164l-176.004-152c-11.071-9.562-11.086-26.753 0-36.328z"/></svg></i>
                    <span>Active <span class="assign">Tickets</span></span>
                </li>
            </a>

            <a href="{{route('student.tickets.status', 'pending')}}">
                <li class="flex-around align-items-center">
                    <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 32C114.6 32 0 125.1 0 240c0 49.6 21.4 95 57 130.7C44.5 421.1 2.7 466 2.2 466.5c-2.2 2.3-2.8 5.7-1.5 8.7S4.8 480 8 480c66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 141.4 0 256-93.1 256-208S397.4 32 256 32z"/></svg></i>
                    <span>Pending <span class="assign">Tickets</span></span>
                </li>
            </a>

            <a href="{{route('student.tickets.status', 'resolved')}}">
                <li class="flex-around align-items-center">
                    <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M64 240c0 49.6 21.4 95 57 130.7-12.6 50.3-54.3 95.2-54.8 95.8-2.2 2.3-2.8 5.7-1.5 8.7 1.3 2.9 4.1 4.8 7.3 4.8 66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 27.4 0 53.7-3.6 78.4-10L72.9 186.4c-5.6 17.1-8.9 35-8.9 53.6zm569.8 218.1l-114.4-88.4C554.6 334.1 576 289.2 576 240c0-114.9-114.6-208-256-208-65.1 0-124.2 20.1-169.4 52.7L45.5 3.4C38.5-2 28.5-.8 23 6.2L3.4 31.4c-5.4 7-4.2 17 2.8 22.4l588.4 454.7c7 5.4 17 4.2 22.5-2.8l19.6-25.3c5.4-6.8 4.1-16.9-2.9-22.3z"/></svg></i>
                    <span>Resolved <span class="assign">Tickets</span></span>
                </li>
            </a>
            <div class="tools">
 
                <a href="{{route('student.tickets.new')}}">
                    <li class="flex-around align-items-center">
                        <i class="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"/></svg>
                        </i>
                    </li>
                </a>
                <li class="flex-around align-items-center">
                    <i class="refresh">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M500.33 0h-47.41a12 12 0 0 0-12 12.57l4 82.76A247.42 247.42 0 0 0 256 8C119.34 8 7.9 119.53 8 256.19 8.1 393.07 119.1 504 256 504a247.1 247.1 0 0 0 166.18-63.91 12 12 0 0 0 .48-17.43l-34-34a12 12 0 0 0-16.38-.55A176 176 0 1 1 402.1 157.8l-101.53-4.87a12 12 0 0 0-12.57 12v47.41a12 12 0 0 0 12 12h200.33a12 12 0 0 0 12-12V12a12 12 0 0 0-12-12z"/></svg>
                    </i>
                </li> 

            </div>
            
        </ul>

        <script>
            // if(document.querySelector('i.refresh')){
                let refresh = function(){
                    location.reload();
                }
                document.querySelector('i.refresh').addEventListener('click', refresh);
            // }

            // if(document.querySelector('meta#page')){

            let active =  function(){
                let regex = ['show', 'active', 'pending', 'resolved', 'new'];
                let lists = document.querySelectorAll('section.header ul li');
                let meta = document.querySelector('meta#page').content;
                let list = [...lists];
                list.pop();

                regex.forEach((match, index) => {
                        if(match == meta){
                            list[index].classList.add('active');
                        }   
                });
                // console.log(list);
            }
            
            window.onload = active;
            // console.log('there');
            // }
        </script>
    </section>


    
    @yield('customBody')
</section>


    @yield('custom')
</section>


@endsection