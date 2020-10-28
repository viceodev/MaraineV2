@extends('layouts.app')
@section('customCss')
    <link rel="stylesheet" href="{{asset('css/studentProfile.css')}}">
    <script src="{{asset('js/passwords.js')}}"></script>
@endsection

@section('content')

    {{-- including the sidebar --}}
    @include('student.profile.sidebar')

    <section class="body">

        <section class="leftMain"></section>


        <section class="rightMain capitalize">
            <section class="top">
                <section class="left">
                    @include('student.profile.personal')
                    @include('student.profile.email')
                </section>

                <section class="right">
                    @include('student.profile.password_reset')
                    @include('student.profile.preferences')
                </section>
            </section>

            <section class="bottom">
                <section class="payments">
                    <p class="box-header">Payments Preferences</p>
                    <p class="payments-p">You have no payments option saved</p>

                    <div class="hr"></div>

                    <div class="p-button">
                        <a href="#"><button>ADD OPTION</button></a>
                    </div>
                    
                </section>

                <div class="hr mt-5 mb-5"></div>
                <section class="sessions">
                        <section class="first">
                            <p class="box-header">Browser's Sessions</p>
                            <p class="content">Manage and logout your active sessions on other browsers and devices. </p>
                        </section>

                        <section class="second">
                            <p>If necessary, you may logout of all of your other browser sessions across all of your devices. If you feel your account has been compromised, you should also update your password. </p>

                            <form action="" method="POST">
                                @csrf 

                                <div class="hr mt-3 mb-5"></div>

                                <div class="p-button">
                                   <button type="submit">LOGOUT OTHERS BROWSERS'S SESSION</button> 
                                </div>
                                
                            </form>
                        </section>     
                </section>

                <div class="hr mt-5 mb-5"></div>

                <section class="delete">
                    <section class="first">
                        <p class="box-header">Delete Account</p>
                        <p class="content">Permanently Delete your account</p>
                    </section>

                    <section class="second">
                        <p>Once your account it deleted, it cannot be retrieved</p>
                        <form action="" method="POST">
                            @csrf 

                            <div class="hr mt-3 mb-5"></div>

                            <div class="p-button">
                                <button type="submit">Delete</button>
                            </div>
                            
                        </form>
                    </section>
                </section>
            </section>
        </section>
    </section>

<script>
    let select = document.querySelector('select#year');
    let monthInput = document.querySelector('select#month');
    let dayInput = document.querySelector('select#day');
    let calenderMonths = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];


    let userdata = "<?php echo Auth::user()->dob; ?>";
    let datasplit = userdata.split('-');
    console.log(datasplit);

    //continue from here. Remove all options from html and do it with javascript so you can add the selected attribute to the correct option.

    let FocusMonth = function(month){
        let monthNum = parseInt(datasplit[1] - 1);
        if(month == calenderMonths[monthNum]){
            return "selected";
        }else{
            return "";
        }
    }
    
    let inputMonth = function(){
        calenderMonths.forEach((month) => {
            monthInput.innerHTML += `<option value="${month}" class="capitalize" ${FocusMonth(month)}>${month}</option>`;
        });
    }
    

    let FocusAge =  function(year){
        if(year == datasplit[0]){
            return "Selected";
        }else{
            return "";
        }
    }

    let inputYear = function(){
        let date = new Date();
        let currentYear = date.getFullYear();
        let legalAge =  currentYear - 18;
        let ageLimit =  1900;


        for(let i = legalAge; i >= ageLimit; i++){

            select.innerHTML += `<option value="${legalAge}" ${FocusAge(legalAge)}>${legalAge}</option>`;


            legalAge--;

            if(legalAge == 1899){
                break;
            }
        }

        // console.log(`${currentYear}, ${ageLimit}, ${legalAge}`);
    }

    let FocusDate = function(date){
        if(date == parseInt(datasplit[2])){
            return "selected";
        }else{
            return "";
        }
    }

    let date =  function(){
        
        let months = {
            "29": ['february'],
            "30": ['april', 'june', 'september', 'november'],
            "31": ['january', 'march', 'may', 'july', 'august', 'october', 'december'],
        };
        let nums = [29,30,31];

        nums.forEach((num) => {
                months[num].forEach((month) => {
                    if(monthInput.value == month){
                        dayInput.innerHTML = "";
                        for(i= 1; i <= parseInt(num); i++){
                            dayInput.innerHTML += `<option value="${i}" ${FocusDate(i)}>${i}</option>`;
                        }
                    }
                })
        });
    }




    inputYear();
    inputMonth();
    date();
    monthInput.addEventListener('click', date);
</script>
@endsection 