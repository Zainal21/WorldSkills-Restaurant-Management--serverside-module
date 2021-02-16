@extends('layout')

@section('content')

    <!-- for guest only - begin -->
    <div id="dining_experience_descriptions">
        <div class="card mt-5">
          <div class="card-header">
           Dining experience desriptions
          </div>
          <div class="card-body">
            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 25%">
                    <col style="width: 25%">
                    <col style="width: 25%">
                    <col style="width: 25%">
                </colgroup>
                <thead>
                <tr>
                    @foreach($exps as $exp)
                    <th>{{ $exp->name }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($exps as $exp)
                        <td>{{ $exp->description }}</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach($exps as $exp)
                        <td>Tables of {{ $exp->tables->join(', ', ' and ') }}</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach($exps as $exp)
                        <td>
                            @foreach($exp->seatings as $seating)
                                Seating{{ $loop->count !== 1 ? ' ' . $loop->iteration : '' }}: {{ $seating->time }}<br>
                            @endforeach
                        </td>
                    @endforeach
                </tr>
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{ route('booking.reservation') }}">Start booking</a>
          </div>
        </div>
    </div>
@endsection
