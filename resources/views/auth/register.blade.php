@extends('auth.auth')


@section('auth-form')
  
            <form action="{{route('register')}}" method="POST">
          
              <div class="process d-none">
                  <span>0%</span>
                  <div class="process-contain">
                      <div class="process-show"></div>
                  </div>
                  <span>100%</span>
              </div>     

          <section class="step">  
              <section class="step-process"></section>     
              @csrf

                <div class="step-child step-1">

                
                {{-- name field  --}}
                <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg></i>

                    <input type="text" name="name" placeholder="Full Name" value="{{old('Name')}}">
                </span><br>

                {{-- username --}}
                <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg></i>

                    <input type="text" name="username" placeholder="Username" value="{{old('username')}}">
                </span><br>


                {{-- email field  --}}
                <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M160 448c-25.6 0-51.2-22.4-64-32-64-44.8-83.2-60.8-96-70.4V480c0 17.67 14.33 32 32 32h256c17.67 0 32-14.33 32-32V345.6c-12.8 9.6-32 25.6-96 70.4-12.8 9.6-38.4 32-64 32zm128-192H32c-17.67 0-32 14.33-32 32v16c25.6 19.2 22.4 19.2 115.2 86.4 9.6 6.4 28.8 25.6 44.8 25.6s35.2-19.2 44.8-22.4c92.8-67.2 89.6-67.2 115.2-86.4V288c0-17.67-14.33-32-32-32zm256-96H224c-17.67 0-32 14.33-32 32v32h96c33.21 0 60.59 25.42 63.71 57.82l.29-.22V416h192c17.67 0 32-14.33 32-32V192c0-17.67-14.33-32-32-32zm-32 128h-64v-64h64v64zm-352-96c0-35.29 28.71-64 64-64h224V32c0-17.67-14.33-32-32-32H96C78.33 0 64 14.33 64 32v192h96v-32z"/></svg></i>

                    <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
                </span><br>
            </div>

            <div class="step-child step-2">

            
                {{-- phone number --}}
                <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"/></svg></i>

                    <input type="text" name="phone" placeholder="Phone Number" value="{{old('phone')}}">
                </span><br>


                {{-- state of origin --}}
                <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg></i>

                    <input type="text" name="" placeholder="Name" value="{{old('Name')}}">
                </span><br>

                {{-- date of birth --}}
                <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm64-192c0-8.8 7.2-16 16-16h96c8.8 0 16 7.2 16 16v96c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16v-96zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"/></svg></i>

                    <input type="date" name="dob" placeholder="Date Of Birth" value="{{old('dob')}}">
                </span><br>
            </div>

            <div class="step-child step-3">

            
                {{-- password field  --}}
                <span class="password">

                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"/></svg>
                    </i>
                    
                    <input type="password" name="password" placeholder="Password">

                    <i id="password"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"/></svg></i>

                    
                </span><br>

                <span class="password">

                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"/></svg>
                    </i>
                    
                    <input type="password" name="password-confirmation" placeholder="Confirm Password">
                    <i id="password"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"/></svg></i>

                    
                </span><br>
            </div>
        </section>

                <div class="button-area">
                    <button type="button" id="previous">Previous</button>
                    <button type="button" id="next">Next</button>
                </div>
                
                <span class="check">Already have an account?<a href="{{route('login')}}"> Login</a></span>
            </form>

            
            <script>
                let next = document.querySelector('button#next');
                let previous = document.querySelector('button#previous');
                let step = document.querySelector('section.step');
                let process =  document.querySelector('div.process-show');
                let steps = [2,3];
                let div_steps = [];
                let start = 0;

                (function(){
                    steps.forEach((step) => {
                        div_steps.push(document.querySelector(`div.step-${step}`));
                    })
                }());
                
                
                    let nextProcess = function(){
                
                    let currentNum = div_steps[start].className.match(/[\d]/g);
                    let move = `-${((parseInt(currentNum[0]) - 1) * 100)}%`;
                    let percent = `${50 * (parseInt(currentNum[0]) - 1)}%`;
                    step.style.cssText = `left: ${move};`;
                    process.style.cssText = `width: ${percent};`;

                       if(currentNum == 3){
                           setTimeout(()=>{
                            next.type = 'submit';
                            next.textContent = 'Signup';                                
                           }, 100);
                        }
                    
                    start =  start + 1;
                }

                let previousProcess = function(){
                    if(start > 0){
                            start = start - 1;

                        let currentNum = div_steps[start].className.match(/[\d]/g);
                        let move = `-${((parseInt(currentNum[0]) - 2) * 100)}%`;
                        let percent = `${50 * (parseInt(currentNum[0]) - 2)}%`;
                        step.style.cssText = `left: ${move};`;
                        process.style.cssText = `width: ${percent};`;

                        if(currentNum < 4){
                            next.type = 'button';
                            next.textContent = 'Next';
                        }
                    }
                    
                }

                

                next.onclick = nextProcess;
                previous.onclick = previousProcess;
            </script>

@endsection