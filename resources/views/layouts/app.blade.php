<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{config('app.name')}}</title>

    <!-- meta tags -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Okonkwo Victor">
    <meta name="descirption" content= "Maraine school management system built by okonkwo victor">

    <!-- og tags -->
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Maraine School management system built by 
    okonkwo victor">
    <meta property="og:description" content="Maraine School management system built by 
    okonkwo victor">
    <meta property = "og:site_name" content="{{config('app.name'), 'Maraine'}}">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="Maraine">
    <meta property="article:publisher" content="http://www.facebook.com/victor.okonkwo.7731247/">
    <meta property="article:author" content="http://www.facebook.com/victor.okonkwo.7731247/">
    <meta property="fb:admins" content="1107000098">
    <meta property="og:image" content="https://cdn4.wpbeginner.com/wp-content/uploads/2016/10/wordpress-security.png">

    <!-- twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="Maraine School management system built by 
    okonkwo victor">
    {{-- <meta name="twitter:title" content="Maraine School management system built by 
    okonkwo victor (2020)"> --}}
    <meta name="twitter:site" content="@viceo_official">
    <meta name="twitter:domain" content="Maraine">
    <meta name="twitter:image" content="">
    <meta name="twitter:creator" content="@viceo_official">
    

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


</body>
<script src="{{asset('./js/app.js')}}"></script>
</html>