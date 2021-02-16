{{-- @extends('layout')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Booking Request
            </div>
            <div class="card-body">
                @if ($res->is_group)
                <form action="{{url('/booking/guest')}}" method="post">
                    <fieldset>
                        <legend>
                            Group
                        </legend>
                        <ul class="nav nav-tabs">
                            @foreach ($days as $day)
                            <li role="presentation" class="{{$loop->first ? 'active' : ''}}"><a href="#c{{$day->id}}"
                                    role="tab" data-toggle="tab">{{$day->name}} : {{$day->date}}</a></li>
                            @endforeach
                        </ul>
                    </fieldset>
                    <table class="table table-bordered">
                        <thead>
                            <th>Dining experience</th>
                            <th>Number of seats available<br />Number of guests to be seated</th>
                            <th>Guest names (if known)</th>
                            <th>Guest country*</th>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </form>
                @else
                <form action="{{url('/booking/guest')}}" method="post">
                    <fieldset>
                        <legend>
                            Individual
                        </legend>
                       
                    </fieldset>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layout')

@section('content')

    <div id="booking_request">
        <h1 class="page-header">Booking request</h1>
        @if($res->is_group)
        <!-- group (depending on selected button on form before) -->
        <form action="{{ route('booking.guests') }}" method="POST">
            @csrf
            <fieldset>
                <legend>Group</legend>
                <p>Booking a group</p>
                <!-- message -->
                <div class="error-message"></div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    @foreach($days as $day)
                    <li role="presentation" class="{{ $loop->first ? 'active' : '' }}"><a href="#c{{ $day->id }}" aria-controls="c{{ $day->id }}" role="tab" data-toggle="tab">{{ $day->name }}: {{ $day->date }}</a></li>
                    @endforeach
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    @foreach($days as $day)
                    <div role="tabpanel" class="tab-pane{{ $loop->first ? ' active' : '' }}" id="c{{ $day->id }}">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Dining experience</th>
                                    <th>Number of seats available<br/>Number of guests to be seated</th>
                                    <th>Guest names (if known)</th>
                                    <th>Guest country*</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($day->options as $opt)
                                <tr>
                                    <td>Casual Dining<br/>10:50 - 12:30</td>
                                    <td>
                                        available: 22 <br/><button type="button" class="btn btn-default addguest" id="c{{$day->id}}-d{{$opt->id}}" onclick="">+ Add guest</button>
                                    </td>
                                    <td id="c{{$day->id}}-d{{$opt->id}}-n">
                                        <!--<p><input type="text" id="c{{$day->id}}-d{{$opt->id}}-n1" name="c{{$day->id}}-d{{$opt->id}}-n1" class="form-control"></p>-->
                                    </td>
                                    <td id="c{{$day->id}}-d{{$opt->id}}-o">
                                        <!--
                                        <p>
                                            <select id="c{{$day->id}}-d{{$opt->id}}-o1" name="c{{$day->id}}-d{{$opt->id}}-o1" class="form-control">
                                                <option value="">choose a country</option>
                                                <option value="AU">AU - Australia</option>
                                                <option value="BR">BR - Brasil</option>
                                                <option value="CA">CA - Canada</option>
                                                <option value="CH">CH - Switzerland</option>
                                                <option value="CN">CN - China</option>
                                                <option value="DE">DE - Germany</option>
                                                <option value="FR">FR - France</option>
                                                <option value="IN">IN - India</option>
                                            </select>
                                        </p>
                                        -->
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endforeach
                </div>
            </fieldset>
            <button class="btn btn-primary" type="submit" name="book-group">Submit booking request</button>
        </form>
        @else
        <!-- individual (depending on selected button on form before) -->
        <form action="{{ route('booking.guests') }}" method="POST">
            @csrf
            <fieldset>
                <legend>Individual</legend>
                <p>Booking an individual guest</p>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Dining experience</th>
                            @foreach($days as $day)
                                <th>{{ $day->name }}: {{ $day->date }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($seatings as $seating)
                            <tr>
                                <td>{{ $seating->experience->name }}<br/>{{ $seating->time }}</td>
                                @foreach($seating->options as $opt)
                                    <td>available: {{ $opt->available }} <input type="checkbox" name="option[]" value="{{ $opt->id }}"></td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <p>Please note that most seating take place at the same time and you are not allowed to change once seated.<br />For a seating that is full, you will be waitlisted.</p>
            </fieldset>
            <button class="btn btn-primary" type="submit" name="book-individual">Submit booking request</button>
        </form>
        @endif
    </div>
@endsection

