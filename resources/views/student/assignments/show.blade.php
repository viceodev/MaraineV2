@extends('student.assignments.index')

@section('customBody')
<section class="list">
<meta  content="show" id="page">

@if(count($assignments) > 0 )

@foreach($assignments as $assignment)
<a href="{{route('student.assignments.status', $assignment['id'])}}">
    <ul class="flex-between assign capitalize">
        <li class="name pr-1">{{$assignment['course']}}</li>
        <li class="li-title bold">{{$assignment['title']}}</li>
        <li class="date opacity" id="assignment-date">{{$assignment['created_at']}}</li>

        @foreach ($status['unsubmitted'] as $unsubmitted)
            @if($assignment['id'] == $unsubmitted['id'])
              <li class="message-danger">unsubmitted</li>
            @endif
        @endforeach


        @foreach ($status['submitted'] as $submitted)
            @if($assignment['id'] == $submitted['assignment_id'])
              <li class="message-success">submitted</li>
            @endif
        @endforeach
        
            
       
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