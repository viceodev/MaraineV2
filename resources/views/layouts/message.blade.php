
<style>
    a.message-errors{
        width: 2rem!important;
    }
    a.message-errors:hover{
        background-color: rgb(153, 26, 26)!important;
        color: white;
    }
</style>
@if(count($errors) > 0)

@for ($i = 0; $i < count($errors->all()); $i++)
    {{-- <div style="position: fixed; right:0%; top: 60px;"> --}}
        <div class="message-danger p-1 shadow-ts rounded" style=" width: 200px; z-index:20000000;  position:relative;" id="{{"rand_".$i}}">
            {{$errors->all()[$i]}}

            <a href="#" target="{{"#"."rand_".$i}}" id="close" class="card bold message-errors" style="position: absolute; top: -10px; right: -20px;">x</a>
        </div>       

    {{-- </div> --}}

@endfor


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