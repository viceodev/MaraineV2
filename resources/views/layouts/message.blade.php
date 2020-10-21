@if(count($error->all()) > 0)

@foreach ($error as $error)
    <div class="message message-danger">
        {{$error}}
    </div>
@endforeach

@endforeach


@if(session('error'))