<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{config('app.name')}}</title>

    <!-- meta tags -->

    @include('layouts.metas')

    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    
    @if(Auth::user()->role == 'student')
    <link rel="stylesheet" href="{{asset('/css/studentApp.css')}}">

    @elseif(auth()->user()->role == 'admin')
    <link rel="stylesheet" href="{{asset("/css/admin.css")}}">
    @endif

    @yield('customCss')
    <link rel="icon" href="{{asset('/img/favicon.png')}}" >
    <link rel="apple-touch-icon" href="{{asset('/img/favicon.png')}}">

    <!-- fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    
    
</head>
<body>

    @if(Auth::user()->role == 'student')
        @include('student.header')

    @elseif(auth()->user()->role == 'admin')
        @include('admin.header')
    @endif

@yield('content')
@include('layouts.message')


</body>


<script src="{{asset('./js/app.js')}}"></script>

</html>