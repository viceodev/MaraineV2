@extends('layouts.app')
@section('customCss')
    <link rel="stylesheet" href="{{asset('css/studentProfile.css')}}">
    <script src="{{asset('js/passwords.js')}}"></script>
@endsection

@section('content')

    {{-- including the sidebar --}}
    @include('general.profile.sidebar')

    <section class="body flex-center">
        <section class="left" style="width: 30%;"></section>

        <section class="right card" style="width: 60%;">
            <p class="md bold title-sm capitalize">Fill Out The Form Below To Register {{$method}} as your prefered mode of payment.</p>
        </section>
    </section>

@endsection