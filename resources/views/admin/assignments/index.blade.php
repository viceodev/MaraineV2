@extends('layouts.app')

@section('customCss')
<link rel="stylesheet" href="{{asset('./css/assignments.css')}}">
@endsection

@section('content')


<section class="profile">

    <div class="profile-sidebar">
            <p class="box-header">My Assignment</p>

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

            <div class="info d-none">
                <div class="first">
                    <section class="header-box"> 9 <div>Active Courses</div> </section>

                    <section class="header-box"> 5 <div>Active Tickets</div> </section>
                </div>
                

                <section class="header-box second"> 3 <div>Pending Payments</div> </section>
            </div>

            <div class="desktop-info d-none">
                <a href="">
                    <section>
                        <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M352 96c0-53.02-42.98-96-96-96s-96 42.98-96 96 42.98 96 96 96 96-42.98 96-96zM233.59 241.1c-59.33-36.32-155.43-46.3-203.79-49.05C13.55 191.13 0 203.51 0 219.14v222.8c0 14.33 11.59 26.28 26.49 27.05 43.66 2.29 131.99 10.68 193.04 41.43 9.37 4.72 20.48-1.71 20.48-11.87V252.56c-.01-4.67-2.32-8.95-6.42-11.46zm248.61-49.05c-48.35 2.74-144.46 12.73-203.78 49.05-4.1 2.51-6.41 6.96-6.41 11.63v245.79c0 10.19 11.14 16.63 20.54 11.9 61.04-30.72 149.32-39.11 192.97-41.4 14.9-.78 26.49-12.73 26.49-27.06V219.14c-.01-15.63-13.56-28.01-29.81-27.09z"/></svg></i>
                        <span>{{count($status['all'])}} Total </span>
                    </section>
                </a>

                <a href="">
                    <section>
                        <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M542.22 32.05c-54.8 3.11-163.72 14.43-230.96 55.59-4.64 2.84-7.27 7.89-7.27 13.17v363.87c0 11.55 12.63 18.85 23.28 13.49 69.18-34.82 169.23-44.32 218.7-46.92 16.89-.89 30.02-14.43 30.02-30.66V62.75c.01-17.71-15.35-31.74-33.77-30.7zM264.73 87.64C197.5 46.48 88.58 35.17 33.78 32.05 15.36 31.01 0 45.04 0 62.75V400.6c0 16.24 13.13 29.78 30.02 30.66 49.49 2.6 149.59 12.11 218.77 46.95 10.62 5.35 23.21-1.94 23.21-13.46V100.63c0-5.29-2.62-10.14-7.27-12.99z"/></svg></i>
                        <span>{{count($status['submitted'])}} Submitted</span>
                    </section>
                </a>

            </div>


        </div>
</section>

<section class="body flex shadow-sm p-1 fade">

<section class="left"></section>

<section class="right">

    <section class="header bg-white" id="header">
        <ul class="flex align-items-center">
            <a href="{{route('assignments.index')}}">
                <li class="flex-around align-items-center">
                    <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M352 96c0-53.02-42.98-96-96-96s-96 42.98-96 96 42.98 96 96 96 96-42.98 96-96zM233.59 241.1c-59.33-36.32-155.43-46.3-203.79-49.05C13.55 191.13 0 203.51 0 219.14v222.8c0 14.33 11.59 26.28 26.49 27.05 43.66 2.29 131.99 10.68 193.04 41.43 9.37 4.72 20.48-1.71 20.48-11.87V252.56c-.01-4.67-2.32-8.95-6.42-11.46zm248.61-49.05c-48.35 2.74-144.46 12.73-203.78 49.05-4.1 2.51-6.41 6.96-6.41 11.63v245.79c0 10.19 11.14 16.63 20.54 11.9 61.04-30.72 149.32-39.11 192.97-41.4 14.9-.78 26.49-12.73 26.49-27.06V219.14c-.01-15.63-13.56-28.01-29.81-27.09z"/></svg></i>
                    <span>All <span class="assign">Assignments</span></span>
                </li>
            </a>





            <div class="tools">
 
                <a href="{{route('assignments.create')}}">
                    <li class="flex-around align-items-center">
                        <i class="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm65.18 216.01H224v80c0 8.84-7.16 16-16 16h-32c-8.84 0-16-7.16-16-16v-80H94.82c-14.28 0-21.41-17.29-11.27-27.36l96.42-95.7c6.65-6.61 17.39-6.61 24.04 0l96.42 95.7c10.15 10.07 3.03 27.36-11.25 27.36zM377 105L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9z"/></svg>
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
            let refresh = function(){
                location.reload();
            }
            document.querySelector('i.refresh').addEventListener('click', refresh);



            let active =  function(){
                let regex = ['show','submit'];
                let lists = document.querySelectorAll('section#header ul li');
                let meta = document.querySelector('meta#page').content;
                let list = [...lists];
                list.pop();

                regex.forEach((match, index) => {
                        if(match == meta){
                            list[index].classList.add('active');
                        }   
                });
            }

            window.onload = active;
        </script>
    </section>


    
    @yield('customBody')
</section>


    @yield('custom')
</section>


@endsection