@extends('student.tickets.index')


@section('customBody')


<section class="container new">
    <meta content="new" id="page">

        <div class="card sm fade mx-1">
            <h2 class="md">Welcome to your support Page</h2>  <br>
            <p class="sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique dolorem, deleniti delectus dicta ut veritatis possimus excepturi alias quod officiis maxime nisi. Vel iste quod harum animi, hic illo enim. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae in unde voluptatem voluptate sequi consequatur deserunt est expedita, dolorem obcaecati praesentium esse facilis ex soluta quos suscipit! Illo, nostrum consectetur?</p>
        </div> 
            
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf 


            <div>

                <span>
                    <label for="subject">Subject</label><br>
                    <input type="text" name="subject" id="subject" placeholder="Type in your subject" value="{{old('subject')}}" class="card" required><br>
                </span>

                    <i>
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M448 96v320h32a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16H320a16 16 0 0 1-16-16v-32a16 16 0 0 1 16-16h32V288H160v128h32a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16H32a16 16 0 0 1-16-16v-32a16 16 0 0 1 16-16h32V96H32a16 16 0 0 1-16-16V48a16 16 0 0 1 16-16h160a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16h-32v128h192V96h-32a16 16 0 0 1-16-16V48a16 16 0 0 1 16-16h160a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16z"/></svg>
                    </i>
                
            </div>
        

            <div>

                <span>
                    <label for="Related">Related Service</label><br>
                    <select  name="related" id="Related"  class="card" style="cursor: pointer;" required><br>
                        <option value="null">Related Service</option>
                        <option value="payments"> Payment Related Issues</option>
                        <option value="assignments">Assignment Related Issues</option>
                        <option value="profile"> Profile Update Related Issues</option>
                    </select>
                </span>
            </div>
 

            <div>

              <span>
                  <label for="urgency">Urgency</label><br>
                  <select name="urgency" id="urgency"  class="card" style="cursor: pointer;" required><br>
                    <option value="null">Urgency</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                  </select>
              </span>
          </div>


            <div>

                <span>
                    <label for="file">upload your assignment file</label><br>
                    <input type="file" name="file" id="file" placeholder="Upload your assignment file" class="card" style="color: black;"><br>
                </span>          
                
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"/></svg>
                </i>
            </div>


            <div>

                <span>
                    <label for="message">Message</label><br>
                    <textarea name="message" id="message" placeholder="Type in your message" class="card" value="{{old('message')}}" required></textarea ><br> 
                </span>               
            </div>


            <section class="p-button">
              <button type="submit" class="button button-primary">Submit</button>
            </section>
    </form>
</section>
@endsection