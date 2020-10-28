@if(count($errors) > 0)

@foreach ($errors->all() as $error)
    <div class="message message-danger">
        {{$error}}
    </div>
@endforeach


@elseif(session('error'))
    <div class="message message-danger">
        {{session('error')}}
    </div>

@elseif(session('warning'))

    <div class="message message-warning">
        {{session('warning')}}
    </div>

@elseif(session('success'))

    <div class="message message-success">
        {{session('success')}}
    </div>
@endif