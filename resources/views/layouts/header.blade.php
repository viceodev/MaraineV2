<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{config('app.name')}}</title>
    
    @include('layouts.metas')
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    

    @yield('customCss')
    <link rel="icon" href="{{asset('/img/favicon.png')}}" >
    <link rel="apple-touch-icon" href="{{asset('/img/favicon.png')}}">

    <!-- fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    
    
</head>
<body>



@yield('content')

@include('layouts.message')

</body>
<script src="{{asset('./js/app.js')}}"></script>
</html>