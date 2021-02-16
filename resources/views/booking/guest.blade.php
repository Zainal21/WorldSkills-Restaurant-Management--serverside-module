@extends('layout')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Booking Request
            </div>
            <div class="card-body">
                @if ($res->is_group)
                <form action="{{route('booking.guests')}}" method="post">
                    <fieldset>
                        <legend>
                            Group
                        </legend>
                        <ul class="nav nav-tabs">
                          @foreach ($days as $day)
                          <li role="presentation" class="{{$loop->first ? 'active' : ''}}"><a href="#c{{$day->id}}" role="tab" data-toggle="tab">{{$day->name}} : {{$day->date}}</a></li>
                          @endforeach
                        </ul>
                      </fieldset>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
