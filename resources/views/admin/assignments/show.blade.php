@extends('admin.assignments.index')

@section('customBody')
<section class="list">
    <meta  content="show" id="page">
    
    @if(count($status['all']) > 0 )
    
    @foreach($status['all'] as $assignment)
    <a href="{{route('assignments.show', $assignment['id'])}}">
        <ul class="flex-between assign capitalize">
            <li class="name pr-1">{{$assignment['course']}}</li>
            <li class="li-title bold">{{$assignment['title']}}</li>
            <li class="date" id="assignment-date">{{$assignment['created_at']}}</li>
        </ul> 
    </a>
    @endforeach
    
    @else
    
    <div class="card message-danger container center capitalize" style="margin: 20px auto;">
        <h2>Opps! nothing to show</h2>
    </div>
    
    @endif
    
    </section>
@endsection