@extends('layouts.app')
@section('customCss')
    <link rel="stylesheet" href="{{asset("./css/users.css")}}">
@endsection

@section('content')
@if($user != null)

<section class="container rounded shadow-ts  p-1 bg-white capitalize form-group fade" style="margin: 15px auto;">
    <div class="message-success rounded p-1 shadow-ts md bold center mx-1 ">Edit {{$user['username']}}'s details</div><br>

    <div class="flex-around align-items-end bg-primary rounded p-1" style="flex-wrap: wrap;">
       <img src="{{$user['picture']}}" alt="{{$user['name']}}">

       <div class="card center">
   
        @if($user['banned'] != 1)
            <form action="{{route('admin.user.ban')}}" style="display: inline" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$user['id']}}">
                <input type="hidden" name="action" value="{{true}}">
                <button type="submit" class="button button-primary">Ban User</button>
            </form>
        @else
            <form action="{{route('admin.user.ban')}}" style="display: inline" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$user['id']}}">
                <input type="hidden" name="action" value="{{false}}">
                <button type="submit" class="button button-primary">Unban User</button>
            </form>
        @endif

            <form action="{{route('admin.user.delete', $user['id'])}}" style="display: inline" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="button btn-trans bg-danger">Delete User</button>
            </form>
            <a href="{{route('admin.submissions.single', $user['id'])}}"><button class="button button-secondary">See Submitted assignment</button></a> 
       </div>
    </div>
    <div class="hr"></div>
    

    <form action="" class="container shadow-ts p-1">
        <label for="name">name</label>
        <input type="text" name="name" id="name" value="{{$user['name']}}">

        <label for="id">user id</label>
        <input type="text" name="id" id="id" value="{{$user['id']}}">

        <label for="username">username</label>
        <input type="text" name="username" id="username" value="{{$user['username']}}">

        <label for="phone">user phone</label>
        <input type="text" name="phone" id="phone" value="{{$user['phone']}}">

        <label for="reg_no">user reg_no</label>
        <input type="text" name="reg_no" id="reg_no" value="{{$user['reg_no']}}">

        <label for="state">user state</label>
        <input type="text" name="state" id="state" value="{{$user['state']}}">

        <label for="lga">user LGA</label>
        <input type="text" name="lga" id="lga" value="{{$user['lga']}}" placeholder="Local Government Area">

        <label for="postal_code">user postal code</label>
        <input type="text" name="postal_code" id="postal_code" value="{{$user['postal_code']}}" placeholder="User Postal Code">

        <label for="level">user level</label>
        <input type="text" name="level" id="level" value="{{$user['level']}}">

        <label for="dob">Birthday</label>
        <input type="date" name="dob" id="dob" value="{{$user['dob']}}">

        <div class="p-button p-1">
            <button type="submit" class="button bg-primary shadow-ts btn-trans">
                Update
            </button>
        </div>
    </form>
</section>

@endif
@endsection