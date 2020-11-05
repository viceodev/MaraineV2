{{-- desktop header  --}}
<header class="desktop  shadow-sm">

    <div class="logo flex align-items-center ml-2" title="Maraine Logo">
        <img src="{{asset('img/favicon.png')}}" alt="{{config('app.name')}}">
        <span class="ml-1 pl-1">{{config('app.name')}}</span>
    </div>

    <form action="" method="POST" class="flex align-items-center" title="Search Maraine">
            <input type="text" name="search" id="search" placeholder="Search Maraine" class="shadow-sm">
            <button type="submit">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>
                </i>
            </button>
            
        
    </form>

    <section class="desktop-icon flex-around align-items-center" title="Home">
        <a href="" class="header-svg">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"/></svg>
        </a>
        

        <div class="bell flex-center align-items-center  header-svg" title="Notification">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M439.39 362.29c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71zM67.53 368c21.22-27.97 44.42-74.33 44.53-159.42 0-.2-.06-.38-.06-.58 0-61.86 50.14-112 112-112s112 50.14 112 112c0 .2-.06.38-.06.58.11 85.1 23.31 131.46 44.53 159.42H67.53zM224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64z"/></svg>
    
            <div class="num">2</div>
        </div>

        <div class="header-svg" id="dark">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M283.211 512c78.962 0 151.079-35.925 198.857-94.792 7.068-8.708-.639-21.43-11.562-19.35-124.203 23.654-238.262-71.576-238.262-196.954 0-72.222 38.662-138.635 101.498-174.394 9.686-5.512 7.25-20.197-3.756-22.23A258.156 258.156 0 0 0 283.211 0c-141.309 0-256 114.511-256 256 0 141.309 114.511 256 256 256z"/></svg>
        </div>

        <div class="sidebar-toggle header-svg" title="Quick Links">
            <svg class="gb_8e" focusable="false" viewBox="0 0 24 24"><path d="M6,8c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM12,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM6,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM6,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM12,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM16,6c0,1.1 0.9,2 2,2s2,-0.9 2,-2 -0.9,-2 -2,-2 -2,0.9 -2,2zM12,8c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM18,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM18,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2z"></path></svg>        
        </div>

        <div class="profile" id="profile" title="Dropdown Options">
            <img src="{{Auth::user()->picture}}" alt="{{Auth::user()->name}}" class="rounded">
    
            <svg width="10" height="5" viewBox="0 0 10 5" xmlns="http://www.w3.org/2000/svg"><title>Dropdown Options</title><path d="M0 0l5 5 5-5z" fill="#090910" fill-rule="nonzero"/></svg>
        </div>
    </section>

</header>





{{-- Mobile header --}}

<header class="mobile bg-white shadow-sm flex-around">
    <img src="{{asset('img/favicon.png')}}" alt="{{config('app.name')}}" class="logo"> 



    <a href="">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"/></svg>
    </a>
    

    <div class="bell flex-center align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M439.39 362.29c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71zM67.53 368c21.22-27.97 44.42-74.33 44.53-159.42 0-.2-.06-.38-.06-.58 0-61.86 50.14-112 112-112s112 50.14 112 112c0 .2-.06.38-.06.58.11 85.1 23.31 131.46 44.53 159.42H67.53zM224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64z"/></svg>

        <div class="num">2</div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>

    <div class="sidebar-toggle">
        <svg class="gb_8e" focusable="false" viewBox="0 0 24 24"><path d="M6,8c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM12,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM6,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM6,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM12,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM16,6c0,1.1 0.9,2 2,2s2,-0.9 2,-2 -0.9,-2 -2,-2 -2,0.9 -2,2zM12,8c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM18,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM18,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2z"></path></svg>        
    </div>
    <div class="profile" id="profile">
        <img src="{{Auth::user()->picture}}" alt="{{Auth::user()->name}}" class="rounded">

        <svg width="10" height="5" viewBox="0 0 10 5" xmlns="http://www.w3.org/2000/svg"><title>nav_arrow</title><path d="M0 0l5 5 5-5z" fill="#090910" fill-rule="nonzero"/></svg>
    </div>
</header>

<section class="mobile_menu capitalize" id="nav-modal">
    <svg width="10"  height="5" viewBox="0 0 10 5" xmlns="http://www.w3.org/2000/svg"><title>nav_arrow</title><path class="shadow" d="M0 0l5 5 5-5z" fill="white" fill-rule="nonzero"/></svg>
    
    <nav class="rounded shadow-sm">
        <ul>
            <li class="p-1 center">Signed In as <b>
                {{Auth::user()->username}}
            </b></li><div class="hr"></div>

            <a href=""><li class="pl-2 pb-1">Assignments</li></a>

            <a href=""><li class="pl-2 pb-1">Fees\Payments</li></a>

            <a href=""><li class="pl-2 pb-1">Tickets</li></a>

            <a href=""><li class="pl-2 pb-1">My Profile</li></a>
            
            <div class="hr"></div>

            <li class="pb-2">
                <form action="{{route('logout')}}" method="post">
                    @csrf 
                    <button>Logout</button>
                </form>
            </li>
        </ul>
    </nav>


</section>

<section class="sidebar fade flex align-items-start">

    <section class="contents shadow-sm">

        <div class="shadow-sm">
            Quick-Links
        </div>

        <ul class="pl-2 pr-2">
            <a href=""><li>Home</li></a>
            <a href=""><li>See Assignments</li></a>
            <a href="#"><li>Submit Assignments</li></a>
            <a href="#"><li>See Tickets</li></a>
            <a href="#"><li>Create New Tickets</li></a>
        </ul>

        <div class="sidebar-form">
            <form action="{{route('logout')}}" method="POST">
                @csrf 

                <button type="submit">Logout
                    <?xml version="1.0" encoding="iso-8859-1"?>
<!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<path d="M493.4,211.2L411.2,129c-11.9-12-27.8-18.5-44.7-18.5c-0.5,0-1.1,0-1.6,0V15c0-8.3-6.7-15-15-15H15C6.7,0,0,6.7,0,15v482
			c0,8.3,6.7,15,15,15h334.9c8.3,0,15-6.7,15-15v-95.5c0.5,0,1.1,0,1.6,0c16.9,0,32.7-6.6,44.7-18.5l82.2-82.2
			c8.8-8.8,14.8-19.9,17.3-32c0.9-4.2,1.3-8.5,1.3-12.7C512,239.1,505.4,223.2,493.4,211.2z M30,482V30h304.9v89
			c-4.7,2.7-9.1,6.1-13.1,10c-11.9,11.9-18.5,27.8-18.5,44.7c0,6.6,1,13,2.9,19.1H272c-16.9,0-32.8,6.6-44.7,18.5
			c-11.9,11.9-18.5,27.8-18.5,44.7c0,16.9,6.6,32.8,18.5,44.7c11.9,11.9,27.8,18.5,44.7,18.5h34.1c-1.9,6.1-2.9,12.5-2.9,19.1
			c0,23.3,12.7,43.7,31.6,54.7l0.1,89H30z M481.3,262.7c-1.3,6.4-4.4,12.2-9.1,16.8L390,361.8c-6.3,6.3-14.6,9.7-23.5,9.7
			c-18.3,0-33.2-14.9-33.2-33.2c0-8.9,3.5-17.2,9.7-23.5c4.3-4.3,5.6-10.7,3.3-16.4c-2.3-5.6-7.8-9.3-13.9-9.3H272
			c-8.9,0-17.2-3.5-23.5-9.7c-6.3-6.3-9.7-14.6-9.7-23.5c0-8.9,3.5-17.2,9.7-23.5c6.3-6.3,14.6-9.7,23.5-9.7h60.4
			c6.1,0,11.5-3.7,13.9-9.3c2.3-5.6,1-12.1-3.2-16.3c-6.3-6.3-9.7-14.6-9.7-23.5c0-8.9,3.5-17.2,9.7-23.5c6.3-6.3,14.6-9.7,23.5-9.7
			c8.9,0,17.2,3.5,23.5,9.7l82.2,82.2c6.3,6.3,9.8,14.6,9.8,23.5C482,258.3,481.8,260.5,481.3,262.7z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>

                </button>
            </form>
        </div>
    </section>

</section>

