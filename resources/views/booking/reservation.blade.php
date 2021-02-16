@extends('layout')
@section('content')
<div class="row">
    <div class="col">
        <div class="row mt-4">
            <div class="col">
                <form action="{{route('bookingreservation.save')}}" method="POST" class="form-group">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            Booking Contact
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Name *</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                    placeholder="input your name" name="name" value="{{old('name')}}">
                                @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Organization *</label>
                                <input type="text" class="form-control" placeholder="input your organization"
                                    organization="organization" value="{{old('organization')}}">
                                @error('organization')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Email *</label>
                                <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                    placeholder="input your email" name="email" value="{{old('email')}}">
                                @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Phone *</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    placeholder="input your phone number" name="phone" value="{{old('phone')}}">
                                @error('phone')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Country *</label>
                                <select name="country" class="form-control" id="">
                                    <option {{ old('country') === '' ? 'selected' : '' }} value="">choose a country
                                    </option>
                                    <option {{ old('country') === 'AU' ? 'selected' : '' }} value="AU">AU - Australia
                                    </option>
                                    <option {{ old('country') === 'BR' ? 'selected' : '' }} value="BR">BR - Brasil
                                    </option>
                                    <option {{ old('country') === 'CA' ? 'selected' : '' }} value="CA">CA - Canada
                                    </option>
                                    <option {{ old('country') === 'CH' ? 'selected' : '' }} value="CH">CH - Switzerland
                                    </option>
                                    <option {{ old('country') === 'CN' ? 'selected' : '' }} value="CN">CN - China
                                    </option>
                                    <option {{ old('country') === 'DE' ? 'selected' : '' }} value="DE">DE - Germany
                                    </option>
                                    <option {{ old('country') === 'FR' ? 'selected' : '' }} value="FR">FR - France
                                    </option>
                                    <option {{ old('country') === 'IN' ? 'selected' : '' }} value="IN">IN - India
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
        <div class="row">
            <div class="col">
                <p> *) these fields must be filled<br />
                    *) if applicable. We might give priority to a sponsor for example, if we get multiple requests.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        GuestReguulations
                    </div>
                    <div class="card-body">
                        <p>
                            Welcome to the Restaurant Service booking request system. All bookings will be submitted to
                            WorldSkills International for final confirmation. <br /><br />

                            Before proceeding with your booking please read and accept the guest regulations:
                        </p>
                        <ul>
                            <li>Guests must be at the Restaurant Service area _15 minutes prior to scheduled seating
                                time.</li>
                            <li>If guests are late (_maximum 5 minutes from allocated time_) their table will not be
                                guaranteed (so that Competitors are not disadvantaged, the tables will be given to
                                standby guests).</li>
                            <li>Once seated – guests must accept all food and beverage that is offered, as Competitors
                                must be marked on all skill areas.</li>
                            <li>Dietary requests cannot be accepted, as menu items must be the same for all Competitors.
                            </li>
                            <li>No mobile phones, videos or cameras are permitted to be used.</li>
                            <li>Guests cannot leave the area until the meal service is completed unless approved by
                                Experts in the area (again this is so that no Competitor is disadvantaged with service).
                            </li>
                            <li>Guests will _not sit_ at the tables where the Competitor is from the same country as the
                                guests.</li>
                            <li>Guest are invited as guests of WorldSkills, they are not to judge the Competitor or
                                interfere with the Competitor in their work or cause disruption to their work or make
                                comments to judges about any of the Competitors.</li>
                            <li>Guest must be legal drinking age according to the Host Country regulations (i.e. 18 in
                                Brazil).</li>
                        </ul>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="agree" {{old('agree') ? 'checked' : ''}}> I agree to the
                                guest regulations and confirm that myself and any guests (group booking) will respect
                                all of the guest regulations
                            </label>
                        </div>
                        <button type="submit" class="mt-4 btn btn-primary" name="agree-individual">Continue Booking for
                            <strong>an Individual</strong></button>
                        <button type="submit" class="btn mt-4 btn-primary" name="agree-group">Continue Booking for
                            <strong>an Group</strong></button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
