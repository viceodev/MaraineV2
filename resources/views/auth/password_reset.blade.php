
@extends('auth.auth')

@section('customCss')
<style>
    @media screen and (max-width: 768px){
        section.auth{
            box-shadow: none!important;
        }

    }

   

    section.socials-group, div.profile p{
        display: none;
    }

    section.forgot{
        width: 90%;
    }

    section.forgot p{
        text-align: center
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 18px;
        /* padding: 10px; */
    }


    section.forgot form{
        padding: 10px;
    }

    section.forgot label{
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-weight: 300;
        font-size: 15px;
        padding: 10px;
    }
    

    section.forgot input{
        width: 90%;
        margin: 10px auto;
        box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.6);
        height: 40px;
        border: none;
        outline: none;
    }

    section.forgot button{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 15px;
    }

    @media screen and (min-width: 1000px){
        div.img{
            display: block!important;
        }

        section.forgot{
            margin-top: 80px;
        }

        section.button{
            padding: 10px 20px!important;
        }
    }
</style>

@endsection

@section('auth-form')

    <section class="forgot container" style="">
        <form action="" method="POST">
            @csrf 

            <p class="mb-5">Forgot your password? No problem. Just let us know your user id and we will email you a password reset link that will allow you to choose a new one.</p>

            <label for="user-info">Username | E-mail | Phone-Number</label><br>
            <input type="text" name="userinfo" id="user-info" placeholder="Username | E-mail | Phone-Number" class=" center rounded p-2">

            <button type="submit" class="button-primary" >Email Password Reset Link</button>
           
        </form>
    </section>
@endsection


@section('auth-img')

<img src="{{asset('img/forgot.png')}}" alt="forgot-password">

@endsection