@extends('student.assignments.index')

@section('customBody')

<style>
    section.header{
        display: none;
    }

</style>


<section class="container submit">
    <meta content="submit" id="page">

        <div class="card notify sm fade mx-1 ">
            <div class="flex-center align-items-center">
                <span class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"/></svg></span>

                <h2 class="capitalize pl-1">Register your courses below</h2>                
            </div>


        </div>    

            <p class="sm container  p-1 message-danger flex-around" id="notify" style="margin: 20px auto">
                <span class="container">
                    NOTE: Do make sure to register the right courses because registered coures can't be changed easily. You can contact your lecturer or the support team via <a href="mailto:profviceo@gmail.com">Support@maraine.com</a>                    
                </span> 
                <a href="#" id="close" target="#notify">x</a>
            </p>
            
    <form action="" method="POST" style="color: black;">
        @csrf 

        <h2 class="center card message-danger">Compulsory Courses For {{auth()->user()->level}} Level</h2>
        <div class="hr"></div>

        @foreach ($courses['main'] as $main)
            <section class="container capitalize flex-around align-items-center card" style="cursor: default; margin: 20px auto">
                <ul>
                    <li>Course title: {{$main['course-title']}}</li>
                    <li>Course code: {{$main['course-code']}}</li>
                    <li>Course Lecturer: {{$main['course-lecturer']}}</li>
                </ul>

                <input type="checkbox" name="main[]"  value="{{$main['course-code']}}" style="cursor: pointer;" required>                
            </section>
        @endforeach

        <div class="hr mb-3"></div>

        {{-- Optional courses --}}

        <h2 class="center card">Optional Courses</h2>
        <section class="message-danger card container flex-around" style="margin: 20px auto;" id="optional">
            <p class="sm">You must choose two out of these optional courses. One of which must be a language</p>

            <a href="#" id="close" target="#optional">x</a>
        </section>
        <section class="container capitalize flex-around align-items-center card" style="cursor: default; margin: 20px auto">
            <ul>
                <li>Course title: {{$courses['optional'][0]['course-title']}}</li>
                <li>Course code: {{$courses['optional'][0]['course-code']}}</li>
                <li>Course Lecturer: {{$courses['optional'][0]['course-lecturer']}}</li>
            </ul>

            <input type="checkbox" name="optional[]" id="" value="{{$courses['optional'][0]['course-code']}}" style="cursor: pointer;">                
        </section>   
        

        <section class="container capitalize flex-around align-items-center card" style="cursor: default; margin: 20px auto">
            <ul>
                <li>Course title: {{$courses['optional'][2]['course-title']}}</li>
                <li>Course code: {{$courses['optional'][2]['course-code']}}</li>
                <li>Course Lecturer: {{$courses['optional'][2]['course-lecturer']}}</li>
            </ul>

            <input type="checkbox" name="optional[]" id="" value="{{$courses['optional'][2]['course-code']}}" style="cursor: pointer;">                
        </section>    

        {{-- languages --}}
        <h2 class="center card message-danger container">Languages</h2>

        @foreach(($courses['optional'][1]['course-code']) as $language)
            <section class="container capitalize flex-around align-items-center card" style="cursor: default; margin: 20px auto">
                <ul>
                    <li>Course title: {{$language['course-title']}}</li>
                    <li>Course code: {{$language['course-code']}}</li>
                    <li>Course Lecturer: {{$language['course-lecturer']}}</li>
                </ul>

                <input type="checkbox" name="language[]" id="" value="{{$language['course-code']}}" style="cursor: pointer;">                
            </section>
        @endforeach
        

        <div class="p-button container-full">
         <button type="submit" class="button button-primary">Submit</button>   
        </div>
        
    </form>
</section>
@endsection