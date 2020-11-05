@extends('student.assignments.index')

@section('customBody')
<style>

    div.card.sm.fade svg{
        width: 30px
    }

    div.card.sm.fade.message-success svg{
        fill: #217243;
    }

    div.card.sm.fade.message-danger svg{
        fill: #981814;
    }

    @media screen and (max-width: 768px){
        section.container{
            margin: 0%;
        }     
    }

</style>

<section class="container single capitalize  mt-3 ">
    @foreach ($status['submitted'] as $submitted)

    @if($submitted['assignment_id'] == $assignment['id'])
        <div class="card message-success sm fade mx-1 flex-center align-items-center bold uppercase">
            <span class="mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"/></svg>
            </span>
            Submitted
        </div>         
    @endif
    @endforeach

    @foreach ($status['unsubmitted'] as $unsubmitted)

    @if($unsubmitted['id'] == $assignment['id'])
        <div class="card message-danger sm fade mx-1 flex-center align-items-center bold uppercase">
            <span class="mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"/></svg>
            </span>
            unsubmitted
        </div>         
    @endif
    @endforeach

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
        @foreach ($status['unsubmitted'] as $unsubmitted)

        @if($unsubmitted['id'] == $assignment['id'])
        <a href="{{route('student.assignments.submit')."?id=".$assignment['id']}}"><button type="button" class="button button-secondary">Submit</button></a>
        @endif

        @endforeach

        <form action="{{route('student.assignments.download', $assignment['filename'])}}" method="POST" style="display: inline;">
            @csrf 
            <button type="submit" class="button button-primary">Download File</button>
        </form>
    </div>
    
</section>
@endsection