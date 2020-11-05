@extends('auth.auth')

@section('customCss')
<script src="{{asset('js/password.js')}}"></script>
<style>
    @media screen and (max-width: 768px){
        section.auth{
            box-shadow: none!important;
        }

    }

   

    section.socials-group, div.profile p{
        display: none;
    }

</style>

@endsection

@section('auth.form')
    <section>
        
        <form action="" method="POST">
            @csrf 

            <input type="hidden" name="token" value="{{$token}}">

            <label for="userinfo">Email</label>
            <input type="text" name="userinfo" id="userinfo" placeholder="Username | Email | Phone-Number">

            <div class="password" id="password-1">
                <div>
                <label for="password">Confirm Password</label>
                <input type="password" name="password" id="password" placeholder="Password"> 
                </div>
    
                <i id="password-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"/></svg></i>
            </div>

            <div class="password" id="password-2">
                <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"> 
                </div>
    
                <i id="password-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"/></svg></i>
            </div>
            
        </form>
    </section>
@endsection