@extends('admin.assignments.index')

@section('customBody')


<section class="container submit">
    <meta content="submit" id="page">  
            
    <form action="{{route('assignments.store')}}" method="POST" enctype="multipart/form-data" class="rounded capitalize">
        @csrf 


            <div>

                <span>
                    <label for="title">Assignment Title</label><br>
                    <input type="text" name="title" id="title" placeholder="Assignment Title" class="card capitalize" value="{{old('title')}}"><br>
                </span>

                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M448 96v320h32a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16H320a16 16 0 0 1-16-16v-32a16 16 0 0 1 16-16h32V288H160v128h32a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16H32a16 16 0 0 1-16-16v-32a16 16 0 0 1 16-16h32V96H32a16 16 0 0 1-16-16V48a16 16 0 0 1 16-16h160a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16h-32v128h192V96h-32a16 16 0 0 1-16-16V48a16 16 0 0 1 16-16h160a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16z"/></svg>
                    </i>
                
            </div>
        

            <div>

                <span>
                    <label for="course">Course</label><br>
                    <input type="text" name="course" id="course" placeholder="Course" class="card capitalize" value="{{old('course')}}"><br>
                </span>

                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"/></svg>
                </i>
            </div>

            <div>

                <span>
                    <label for="lecturer">Assigned Lecturer</label><br>
                    <input type="text" name="lecturer" id="lecturer" placeholder="Assigned Lecturer" class="card capitalize" value="{{old('lecturer')}}"><br>
                </span>

                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M208 352c-2.39 0-4.78.35-7.06 1.09C187.98 357.3 174.35 360 160 360c-14.35 0-27.98-2.7-40.95-6.91-2.28-.74-4.66-1.09-7.05-1.09C49.94 352-.33 402.48 0 464.62.14 490.88 21.73 512 48 512h224c26.27 0 47.86-21.12 48-47.38.33-62.14-49.94-112.62-112-112.62zm-48-32c53.02 0 96-42.98 96-96s-42.98-96-96-96-96 42.98-96 96 42.98 96 96 96zM592 0H208c-26.47 0-48 22.25-48 49.59V96c23.42 0 45.1 6.78 64 17.8V64h352v288h-64v-64H384v64h-76.24c19.1 16.69 33.12 38.73 39.69 64H592c26.47 0 48-22.25 48-49.59V49.59C640 22.25 618.47 0 592 0z"/></svg>
                </i>
            </div>

            <div>

                <span>
                    <label for="level">Assigned Level</label><br>
                    <input type="text" name="level" id="level" placeholder="Assigned Level" class="card capitalize" value="{{old('level')}}"><br>
                </span>

                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M313.553 119.669L209.587 7.666c-9.485-10.214-25.676-10.229-35.174 0L70.438 119.669C56.232 134.969 67.062 160 88.025 160H152v272H68.024a11.996 11.996 0 0 0-8.485 3.515l-56 56C-4.021 499.074 1.333 512 12.024 512H208c13.255 0 24-10.745 24-24V160h63.966c20.878 0 31.851-24.969 17.587-40.331z"/></svg>
                </i>
            </div>


            <p class="m-1" style="color: black; font-size:17px;">allowed file types</p>
            <section class="current-allowed card flex-between  container-full" style="color: black; flex-wrap: wrap; margin-left: 10px; text-transform: uppercase;">
                <span class="flex-around align-items-center">                    
                    <label for="doc">Doc</label>
                    <input type="checkbox" name="allowed[]" class="mr-1 ml-1" id="allowed" value="doc">
                </span>

                <span class="flex-around align-items-center">                
                    <label for="pdf">pdf</label>
                    <input type="checkbox" name="allowed[]" class="mr-1 ml-1" id="allowed" value="pdf">
                </span>

                <span class="flex-around align-items-center">
                    <label for="png">png</label>
                    <input type="checkbox" name="allowed[]" class="mr-1 ml-1" id="allowed" value="png">
                </span>

                <span class="flex-around align-items-center">
                    <label for="jpg">jpg</label>
                    <input type="checkbox" name="allowed[]" class="mr-1 ml-1" id="allowed" value="jpg">
                </span>

                <span class="flex-around align-items-center">
                    <label for="jpeg">jpeg</label>
                    <input type="checkbox" name="allowed[]" class="mr-1 ml-1" id="allowed" value="jpeg">
                </span>
                <span class="flex-around align-items-center">
                    <label for="mp3">mp3</label>
                    <input type="checkbox" name="allowed[]" class="mr-1 ml-1" id="allowed" value="mp3">
                </span>

                <span class="flex-around align-items-center">
                    <label for="mp4">mp4</label>
                    <input type="checkbox" name="allowed[]" class="mr-1 ml-1" id="allowed" value="mp4">
                </span>
            </section><br>


            <div>

                <span>
                    <label for="submission">Submission Date</label><br>
                    <input type="date" name="submission_date" id="submission" placeholder="Submission Date" class="card capitalize" value="{{ $status['date']}}"><br>
                </span>
            </div>


            <div>

                <span>
                    <label for="file">upload your assignment file</label><br>
                    <input type="file" name="assign_file" id="file" placeholder="Upload your assignment file" class="card capitalize" style="cursor: pointer; color: black;"  value="{{old('file')}}"><br>
                </span>          
                
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"/></svg>
                </i>
            </div>


            <div>

                <span>
                    <label for="note">Short Note</label><br>
                    <textarea name="note" id="note" placeholder="Type in a short note" class="card" value="{{old('note')}}"></textarea><br> 
                </span>               
            </div>

            <div class="p-button">
                <button type="submit" class="button button-primary">Submit</button>
            </div>

        
    </form>
</section>
@endsection