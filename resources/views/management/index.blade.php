@extends('layout')

@section('content')

    <div id="reservation_management">
        <h1>Reservation management</h1>
        <form action="{{ route('management') }}" method="POST">
            @csrf
            <fieldset>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <colgroup>
                            <col style="width: 5%">
                            <col style="width: 30%">
                            <col style="width: 10%">
                            <col style="width: 30%">
                            <col style="width: 10%">
                            <col style="width: 5%">
                            <col style="width: 5%">
                            <col style="width: 5%">
                            <col style="width: 5%">
                        </colgroup>
                        <thead>
                        <tr>
                            <th rowspan="2">Day</th>
                            <th rowspan="2">Seating</th>
                            <th rowspan="2">Booking No.</th>
                            <th rowspan="2">Guests</th>
                            <th rowspan="2">Status</th>
                            <th colspan="4">Action</th>
                        </tr>
                        <tr>
                            <th>Confirm</th>
                            <th>Decline</th>
                            <th>Waitlist</th>
                            <th>Reschedule</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($guests as $guest)
                        <tr>
                            <td>{{ $guest->option->day->name }}</td>
                            <td>{{ $guest->option->seating->experience->name }} {{ $guest->option->seating->time }}</td>
                            <td><span title="{{ $guest->reservation->name }}, {{ $guest->reservation->organization ?? '(no organization)' }}, {{ $guest->reservation->phone ?? '(no phone)' }}, {{ $guest->reservation->email }}, {{ $guest->reservation->country }}">#{{ $guest->reservation->id }}</span></td>
                            <td>{{ $guest->name }} {{ $guest->country }}</td>
                            <td>{{ $guest->status }}</td>
                            <td><p class="text-center"><input type="radio" name="state[{{$guest->id}}]" value="confirm"></p></td>
                            <td><p class="text-center"><input type="radio" name="state[{{$guest->id}}]" value="decline"></p></td>
                            <td><p class="text-center"><input type="radio" name="state[{{$guest->id}}]" value="waitlist"></p></td>
                            <td><p class="text-center"><input type="radio" name="state[{{$guest->id}}]" value="reschedule"></p></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </fieldset>
            <button class="btn btn-default" type="submit" name="create-guest-list">Create guest list</button>
            <button class="btn btn-default" type="submit" name="send-emails">Send emails</button>
            <button class="btn btn-primary" type="submit" name="save-confirmations">Save changes</button>
        </form>
    </div>
@endsection
