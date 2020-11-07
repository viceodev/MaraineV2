@extends('admin.assignments.index')

@section('customBody')


<section class="container submit">
    <meta content="show" id="page">

    @foreach($status['all'] as $assignment)
        @if($assignment['id'] == $status['id'])
            <p class="center mx-2 card md"> <span class="bold">Assignment Title:</span> {{$assignment['title']}} </p>

            <ul>
                <li class="mx-1"><span class="bold">Assignment id:</span> {{$assignment['id']}}</li>
                <li class="mx-1"><span class="bold">Course:</span> {{$assignment['course']}}</li>
                <li class="mx-1"><span class="bold">Lecturer:</span> {{$assignment['lecturer']}}</li>
                <li class="mx-1"><span class="bold">Submission Date:</span> {{$assignment['submission_date']}}</li>    
            </ul>
            
        
            <p class="sm"><span class="bold">Short-Note</span> &nbsp; {{$assignment['short_note']}}</p>
        
            <div class="hr"></div>

            <div class="p-button">
                <a href=""><button class="button button-primary">See Submissions</button></a>
                <a href="{{route('assignments.edit', $assignment['id'])}}"><button class="btn-trans button bg-success">Edit Assignment</button></a>

                <form action="{{route('assignments.destroy', $assignment['id'])}}" method="POST" style="display:inline;">
                    @csrf 
                    @method('delete')

                    <button class="btn-trans button bg-danger">Delete Assignment</button>
                </form>
            </div>
        @endif
    @endforeach
</section>
@endsection