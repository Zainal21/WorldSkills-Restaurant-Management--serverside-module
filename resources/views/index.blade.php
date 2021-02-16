@extends('layout')

@section('content')
<div class="row mt-5 justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Guest in Restaurant Service</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <colgroup>
                        <col style="25%">
                        <col style="25%">
                        <col style="25%">
                        <col style="25%">
                    </colgroup>
                    <thead>
                      <tr>
                        {{-- untuk meloop nama dari experience --}}
                        @foreach ($exps as $exp)
                        <th>{{$exp->name}}</th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        {{-- untuk me-loop description --}}
                        @foreach ($exps as $item)
                        <td>{{$item->description}}</td>
                        @endforeach
                      </tr>
                      <tr>
                        {{-- untuk me-loop table yang tersedia --}}
                        @foreach ($exps as $item)
                        <td>Tables of   {{$item->tables}}</td>
                        @endforeach
                      </tr>
                      <tr>
                        {{-- untuk me-loop kursi --}}
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
                <a href="{{route('booking.reservation')}}" class="btn btn-primary m-auto">Star Booking</a>
            </div>
        </div>
    </div>
</div>
@endsection
