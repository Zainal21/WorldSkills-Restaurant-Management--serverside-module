@extends('layout')

@section('content')

    <div id="submission_confirmation">
        <h1 class="page-header">Submission confirmation</h1>
        <p>
            {{ $res->name }},<br/><br/>
            Thank you for your booking request #{{ $res->id }}.<br/><br/>

            You have requested booking for the following guests:
        </p>
        <ul>
            @foreach($res->guests as $guest)
            <li>{{ $guest->option->day->name }} - {{ $guest->option->day->date }}, {{ $guest->option->seating->experience->name }} {{ $guest->option->time }} for {{ $guest->name }} {{ $guest->country }}</li>
            @endforeach
        </ul>
        <p>
            Please note that these booking requests will need to be reviewed and confirmed by WSI. <br/>
            You will receive an email with the confirmation as soon as possible.
        </p>
    </div>
@endsection
