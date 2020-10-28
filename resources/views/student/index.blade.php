@extends('layouts.app')
@section('customCss')
    <link rel="stylesheet" href="{{asset('css/studentHome.css')}}">
@endsection

@section('content')

<section class="hero shadow">
    <img src="{{asset('img/invite.svg')}}" alt="invite management" class="d-none">

    <div class="rounded p-3">
        <h1 class="capitalize center">Welcome back {{Auth::user()->username}}</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et eligendi temporibus qui facilis corrupti vel quidem doloribus facere accusamus eum! Molestias, consectetur qui facilis necessitatibus asperiores ducimus corporis explicabo excepturi eaque, accusamus dignissimos maiores mollitia eius minima sapiente? Aut, eaque?</p>
    </div>
</section>

<section class="info-body flex-around flex-rep align-items-center center">

    <div class="bg-white shadow-sm rounded">
            <?xml version="1.0"?>
    <svg xmlns="http://www.w3.org/2000/svg" id="Line" height="100px" viewBox="0 0 64 64" width="100px" class=""><g><path d="m51.5 35a8 8 0 1 1 -8-8 8.009 8.009 0 0 1 8 8zm8 0a16 16 0 1 1 -16-16 16.019 16.019 0 0 1 16 16zm-6 0a10 10 0 1 0 -10 10 10.011 10.011 0 0 0 10-10zm-24.566 10.533-4.384 13.151a1 1 0 0 0 1.091 1.306l6.571-.939 4.662 3.73a1 1 0 0 0 1.519-.334l4.734-9.466a17.963 17.963 0 0 1 -14.193-7.448zm33.513 13.151-4.383-13.15a17.966 17.966 0 0 1 -14.193 7.447l4.729 9.466a1 1 0 0 0 1.52.334l4.662-3.73 6.571.939a1 1 0 0 0 1.094-1.306z" fill="#c4a2fc" data-original="#C4A2FC" style="fill:#FFA500" class="active-path" data-old_color="#c4a2fc"/><path d="m44.5 1h-27a7.008 7.008 0 0 0 -7 7v32h-6a3 3 0 0 0 -3 3v1a7.008 7.008 0 0 0 7 7h24a7.009 7.009 0 0 0 7-7v-32h9a3 3 0 0 0 3-3v-1a7.008 7.008 0 0 0 -7-7zm-36 48a5.006 5.006 0 0 1 -5-5v-1a1 1 0 0 1 1-1h20a1 1 0 0 1 1 1v1a6.98 6.98 0 0 0 2.105 5zm29-5a5 5 0 0 1 -10 0v-1a3 3 0 0 0 -3-3h-12v-32a5.006 5.006 0 0 1 5-5h22.1a6.984 6.984 0 0 0 -2.1 5zm12-35a1 1 0 0 1 -1 1h-9v-2a5 5 0 0 1 10 0zm-16-1a1 1 0 0 1 -1 1h-12a1 1 0 0 1 0-2h12a1 1 0 0 1 1 1zm0 9a1 1 0 0 1 -1 1h-15a1 1 0 0 1 0-2h15a1 1 0 0 1 1 1zm0 6a1 1 0 0 1 -1 1h-15a1 1 0 0 1 0-2h15a1 1 0 0 1 1 1zm0 6a1 1 0 0 1 -1 1h-15a1 1 0 0 1 0-2h15a1 1 0 0 1 1 1zm0 6a1 1 0 0 1 -1 1h-15a1 1 0 0 1 0-2h15a1 1 0 0 1 1 1z" fill="#151a6a" data-original="#151A6A" class="" style="fill:#151A6A" data-old_color="#151a6a"/></g> </svg>

    <p>Active Courses</p>
    <span>3</span>
    </div>

    <div class="bg-white shadow-sm rounded">
            <?xml version="1.0"?>
    <svg xmlns="http://www.w3.org/2000/svg" id="Line" width="100px" height="100px" viewBox="0 0 64 64" class=""><g><path d="M57,31H31a3,3,0,0,0-3,3V60a3,3,0,0,0,3,3H57a3,3,0,0,0,3-3V34A3,3,0,0,0,57,31ZM51.8,41.6l-9,12a1,1,0,0,1-1.507.107l-6-6a1,1,0,0,1,1.414-1.414l5.185,5.185L50.2,40.4a1,1,0,1,1,1.6,1.2Z" style="fill:#FFA500" data-original="#C4A2FC" class="active-path" data-old_color="#C4A2FC"/><path d="M39,51a3,3,0,0,0,3-3V14a4.1,4.1,0,0,0-.1-.447l-6-12A1.047,1.047,0,0,0,35,1H7A3,3,0,0,0,4,4V48a3,3,0,0,0,3,3ZM33.684,6.868,35,4.236l3.421,6.843-4.4-2.932A1,1,0,0,1,33.684,6.868ZM6,48V4A1,1,0,0,1,7,3H33.382L31.9,5.974a3,3,0,0,0,1.02,3.838L40,14.535V48a1,1,0,0,1-1,1H7A1,1,0,0,1,6,48Zm7-37a1,1,0,0,1,1-1h9a1,1,0,0,1,0,2H14A1,1,0,0,1,13,11Zm0,4a1,1,0,0,1,1-1h9a1,1,0,0,1,0,2H14A1,1,0,0,1,13,15Zm0,8a1,1,0,0,1,1-1H32a1,1,0,0,1,0,2H14A1,1,0,0,1,13,23Zm0,6a1,1,0,0,1,1-1H32a1,1,0,0,1,0,2H14A1,1,0,0,1,13,29Zm0,6a1,1,0,0,1,1-1H32a1,1,0,0,1,0,2H14A1,1,0,0,1,13,35Zm0,6a1,1,0,0,1,1-1H32a1,1,0,0,1,0,2H14A1,1,0,0,1,13,41Z" style="fill:#151A6A" data-original="#151A6A" class="" data-old_color="#151a6a"/></g> </svg>
        <p>Submitted Assignment</p>
        <span>3</span>
    </div>


    <div class="bg-white shadow-sm  rounded">
        <?xml version="1.0"?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="100px" height="100px"><g><g id="_13-transfer" data-name="13-transfer"><g id="linear_color" data-name="linear color"><path d="M32,454a10,10,0,0,0,0,20H224a10,10,0,0,0,0-20h-6V361h6a10,10,0,0,0,10-10V336a10,10,0,0,0-4.453-8.32l-96-64a10,10,0,0,0-11.094,0l-96,64A10,10,0,0,0,22,336v15a10,10,0,0,0,10,10h6v93Zm58-92h76v92H90Zm96,92V362h12v92ZM128,284.019,213.472,341H42.528ZM58,362H70v92H58Z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#00061A"/><path d="M240,486H16a10,10,0,0,0,0,20H240a10,10,0,0,0,0-20Z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#00061A"/><path d="M288,200a10,10,0,0,0,0,20H480a10,10,0,0,0,0-20h-6V107h6a10,10,0,0,0,10-10V82a10,10,0,0,0-4.453-8.32l-96-64a10,10,0,0,0-11.094,0l-96,64A10,10,0,0,0,278,82V97a10,10,0,0,0,10,10h6v93Zm58-92h76v92H346Zm96,92V108h12v92ZM384,30.019,469.473,87H298.527ZM314,108h12v92H314Z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#00061A"/><path d="M496,232H272a10,10,0,0,0,0,20H496a10,10,0,0,0,0-20Z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#00061A"/><path d="M429.129,289.2a10,10,0,0,0-12.136,7.26A165.381,165.381,0,0,1,298.061,416.607l12.247-22.894a10,10,0,0,0-17.635-9.434L270.031,426.6a10,10,0,0,0,4.285,13.631l42.8,21.76a10,10,0,1,0,9.065-17.828l-18.6-9.457A185.863,185.863,0,0,0,436.39,301.339,10,10,0,0,0,429.129,289.2Z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#00061A"/><path d="M82.872,222.8a9.984,9.984,0,0,0,12.135-7.26A165.383,165.383,0,0,1,213.939,95.393l-12.247,22.894a10,10,0,1,0,17.635,9.434L241.969,85.4a10,10,0,0,0-4.285-13.631l-42.8-21.76a10,10,0,1,0-9.065,17.828l18.6,9.457A185.86,185.86,0,0,0,75.611,210.661,10,10,0,0,0,82.872,222.8Z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#00061A"/></g></g></g> </svg>
        <p>Pending Payments</p>
        <span>3</span>
    </div>
</section>

<h1 class="title-sm mt-3">Recent Activities</h1>

<section class="latest">

    <section class="table-container">
        <section class="table rounded shadow-sm">
            <table>
                <thead class="header">
                    <th>Course</th>
                    <th>Assignment Title</th>
                    <th>Due Date</th>
                </thead>

                <tr>
                    <td><a href="#">Mgt 101</a></td>
                    <td><a href="#">Lorem ipsum dolor sit amet.</a></td>
                    <td><a href="#">09-02-2020</a></td>
                </tr>

                <tr>
                    <td><a href="#">Pmt 101</a></td>
                    <td><a href="#">Lorem ipsum dolor sit amet.</a></td>
                    <td><a href="#">02-02-2020</a></td>
                </tr>

                <tr>
                    <td>Mpn 101</td>
                    <td>Lorem ipsum dolor sit amet.</td>
                    <td>09-03-2020</td>
                </tr>

                <tr>
                    <td>Mgt 101</td>
                    <td>Lorem ipsum dolor sit amet.</td>
                    <td>09-02-2020</td>
                </tr>
            </table>
            
        </section>

        <a href="#"><button class="button button-primary">See All</button></a>
    </section>

    <section class="events rounded shadow-sm">
        <p class="title-sm">Upcoming Events</p>
        <div class="hr"></div>

        <div class="events-content rounded">
            <a href="#">
            <img src="{{asset('img/background.jpg')}}" alt="upcoming events">

            <div>
                Maraine Grand Cultural Party
                <span>01-03-2020</span>
            </div>
            </a>
        </div>

        <div class="events-content rounded">
            <a href="#">
            <img src="{{asset('img/science.png')}}" alt="upcoming events">

            <div>
                Maraine Grand Cultural Party
                <span>01-03-2020</span>
            </div>
            </a>
        </div>

        <a href="#"><button class="button button-primary">See All</button></a>
    </section>
</section>
@endsection