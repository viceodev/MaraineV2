@extends('admin.assignments.index')

@section('customBody')


<section class="container submit">
    <meta content="submit" id="page">
  
    @foreach($status['all'] as $assignment)
        @if($assignment['id'] == $status['id'])          
    <form action="{{route('assignments.update', $assignment['id'])}}" method="POST" enctype="multipart/form-data" class="capitalize">
        @csrf 
        @method('PUT')
            <input type="hidden" name="id" id="id" placeholder="Assignment id" class="card capitalize" value="{{$assignment['id']}}"><br>

            <div>

                <span>
                    <label for="id">Assignment Id</label><br>
                    <input type="text"  placeholder="Assignment id" class="card capitalize" value="{{$assignment['id']}}" disabled><br>
                    
                </span>

                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M512 176.001C512 273.203 433.202 352 336 352c-11.22 0-22.19-1.062-32.827-3.069l-24.012 27.014A23.999 23.999 0 0 1 261.223 384H224v40c0 13.255-10.745 24-24 24h-40v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24v-78.059c0-6.365 2.529-12.47 7.029-16.971l161.802-161.802C163.108 213.814 160 195.271 160 176 160 78.798 238.797.001 335.999 0 433.488-.001 512 78.511 512 176.001zM336 128c0 26.51 21.49 48 48 48s48-21.49 48-48-21.49-48-48-48-48 21.49-48 48z"/></svg>
                    </i>
                
            </div>

                
            
            <div>

                <span>
                    <label for="id">Assignment Title</label><br>
                    <input type="text" name="title" id="title" placeholder="Assignment Title" class="card capitalize" value="{{$assignment['title']}}"><br>
                </span>

                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M448 96v320h32a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16H320a16 16 0 0 1-16-16v-32a16 16 0 0 1 16-16h32V288H160v128h32a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16H32a16 16 0 0 1-16-16v-32a16 16 0 0 1 16-16h32V96H32a16 16 0 0 1-16-16V48a16 16 0 0 1 16-16h160a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16h-32v128h192V96h-32a16 16 0 0 1-16-16V48a16 16 0 0 1 16-16h160a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16z"/></svg>
                    </i>
                
            </div>

            
            <div>

                <span>
                    <label for="lecturer">Assignment Lecturer</label><br>
                    <input type="text" name="lecturer" id="lecturer" placeholder="Assignment lecturer" class="card capitalize" value="{{$assignment['lecturer']}}"><br>
                </span>

                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M208 352c-2.39 0-4.78.35-7.06 1.09C187.98 357.3 174.35 360 160 360c-14.35 0-27.98-2.7-40.95-6.91-2.28-.74-4.66-1.09-7.05-1.09C49.94 352-.33 402.48 0 464.62.14 490.88 21.73 512 48 512h224c26.27 0 47.86-21.12 48-47.38.33-62.14-49.94-112.62-112-112.62zm-48-32c53.02 0 96-42.98 96-96s-42.98-96-96-96-96 42.98-96 96 42.98 96 96 96zM592 0H208c-26.47 0-48 22.25-48 49.59V96c23.42 0 45.1 6.78 64 17.8V64h352v288h-64v-64H384v64h-76.24c19.1 16.69 33.12 38.73 39.69 64H592c26.47 0 48-22.25 48-49.59V49.59C640 22.25 618.47 0 592 0z"/></svg>
                    </i>
                
            </div>


        

            <div>

                <span>
                    <label for="course">Course</label><br>
                    <input type="text" name="course" id="course" placeholder="Course" class="card capitalize" value="{{ $assignment['course']}}"><br>
                </span>

                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"/></svg>
                </i>
            </div>

            <div>

                <span>
                    <label for="submission">Submission Date</label><br>
                    <input type="date" name="submission_date" id="submission" placeholder="Submission Date" class="card capitalize" value="{{ $assignment['submission_date']}}"><br>
                </span>
            </div>
        


            <div>

                <span>
                    <label for="file">upload a new assignment file</label><br>
                    <input type="file" name="assign_file" id="file" placeholder="Upload your assignment file" class="card capitalize" style="cursor: pointer; color: black;"><br>
                </span>          
                
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"/></svg>
                </i>
            </div>



            @if($assignment['filename'] != null)
                <div class="card">
                   Assignment-File: <a href="{{route('admin.assignments.download', $assignment['filename'])}}" class="pl-1">Download File</a>
                   <input type="hidden" name="filename" value="{{$assignment['filename']}}">
                </div>
            @endif


            <p class="m-1" style="color: black; font-size:17px;">allowed file type</p>
            <section class="current-allowed card flex-between  container-full" style="color: black; flex-wrap: wrap; margin-left: 10px"></section><br>


            <script>
                let allowed = `<?php echo $assignment['allowed']; ?>`;
                allowed = allowed.split(",");
                let defaultAllowed =  ['mp3', 'pdf', 'doc', 'png', 'jpg', 'jpeg', 'svg'];
                let div = document.querySelector('section.current-allowed');


                let inputted = function(){
                    let inputs =  document.querySelectorAll('input#allowed');
                    let values = {};
                    let display = "";

                    inputs.forEach((input) =>{
                        value = input.value;
                        values[value] = value;
                    });

                    defaultAllowed.forEach(allow => {
                        if(! values.hasOwnProperty(allow)){
                            display += `
                            <span class="flex-around align-items-center">
                            <label for="allowed" style="text-transform: uppercase;">${allow}</label>
                            <input type="checkbox" name="allowed[]" id="allowed" class="mr-1 ml-1" value="${allow}"></span>`;
                        }
                    })

                    div.innerHTML += display;
                    // console.log(values);
                }

                let displayAllowed =  function(){
                    
                    let display = "";

                    allowed.forEach(allow => {
                        display += `
                        <span class="flex-around align-items-center">
                        <label for="allowed" style="text-transform: uppercase;">${allow}</label>
                        <input type="checkbox" name="allowed[]" id="allowed" class="mr-1 ml-1" value="${allow}" checked></span>`;
                    });
                    div.innerHTML += display;
                    inputted();
                    
                }


                window.onload = displayAllowed;
            </script>

            <div>

                <span>
                    <label for="note">Short Note</label><br>
                    <textarea name="note" id="note" placeholder="Type in a short note" class="card">{{$assignment['short_note']}}</textarea><br> 
                </span>               
            </div>
            

            <div class="p-button">
                <button type="submit" class="button button-primary">Submit</button>
            </div>

        
    </form>
    @endif
    @endforeach
</section>
@endsection