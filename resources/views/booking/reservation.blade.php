@extends('layout')

@section('content')

    <div id="booking_contact_guest_regulations " class="mt-5">
        <form action="{{ route('booking.reservation') }}" method="POST" class="form-horizontal">
            @csrf
            <fieldset>
                <div class="card">
                    <div class="card-header">Booking Contact</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Name *</label>
                            <input type="text" id="name" name="name" required="required" class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="organization" class="col-sm-3 control-label">Organization °</label>
                            <input type="text" id="organization" name="organization" class="form-control" value="{{ old('organization') }}">
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email *</label>
                            <input type="text" id="email" name="email" required="required" class="form-control" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-3 control-label">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <label for="country" class="col-sm-3 control-label">Country *</label>
                            <select id="country" name="country" required="required" class="form-control">
                                <option {{ old('country') === '' ? 'selected' : '' }} value="">choose a country</option>
                                <option {{ old('country') === 'AU' ? 'selected' : '' }} value="AU">AU - Australia</option>
                                <option {{ old('country') === 'BR' ? 'selected' : '' }} value="BR">BR - Brasil</option>
                                <option {{ old('country') === 'CA' ? 'selected' : '' }} value="CA">CA - Canada</option>
                                <option {{ old('country') === 'CH' ? 'selected' : '' }} value="CH">CH - Switzerland</option>
                                <option {{ old('country') === 'CN' ? 'selected' : '' }} value="CN">CN - China</option>
                                <option {{ old('country') === 'DE' ? 'selected' : '' }} value="DE">DE - Germany</option>
                                <option {{ old('country') === 'FR' ? 'selected' : '' }} value="FR">FR - France</option>
                                <option {{ old('country') === 'IN' ? 'selected' : '' }} value="IN">IN - India</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-sm-offset-3 col-sm-9">
                                <p>
                                    *) these fields must be filled<br />
                                    °) if applicable. We might give priority to a sponsor for example, if we get multiple requests.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="card mt-5">
                    <div class="card-header">Guest regulations</div>
                    <div class="card-body">
                        <p>
                            Welcome to the Restaurant Service booking request system. All bookings will be submitted to WorldSkills International for final confirmation. <br/><br/>

                            Before proceeding with your booking please read and accept the guest regulations:
                        </p>
                        <ul>
                            <li>Guests must be at the Restaurant Service area _15 minutes prior to scheduled seating time.</li>
                            <li>If guests are late (_maximum 5 minutes from allocated time_) their table will not be guaranteed (so that Competitors are not disadvantaged, the tables will be given to standby guests).</li>
                            <li>Once seated – guests must accept all food and beverage that is offered, as Competitors must be marked on all skill areas.</li>
                            <li>Dietary requests cannot be accepted, as menu items must be the same for all Competitors.</li>
                            <li>No mobile phones, videos or cameras are permitted to be used.</li>
                            <li>Guests cannot leave the area until the meal service is completed unless approved by Experts in the area (again this is so that no Competitor is disadvantaged with service).</li>
                            <li>Guests will _not sit_ at the tables where the Competitor is from the same country as the guests.</li>
                            <li>Guest are invited as guests of WorldSkills, they are not to judge the Competitor or interfere with the Competitor in their work or cause disruption to their work or make comments to judges about any of the Competitors.</li>
                            <li>Guest must be legal drinking age according to the Host Country regulations (i.e. 18 in Brazil).</li>
                        </ul>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="agree" name="agree"{{ old('agree') ? 'checked' : '' }}"> I agree to the guest regulations and confirm that myself and any guests (group booking) will respect all of the guest regulations
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <button class="btn btn-primary mt-3" name="agree-individual" type="submit">Continue booking for<strong> an individual</strong></button>
            <button class="btn btn-primary mt-3" name="agree-group" type="submit">Continue booking for<strong> a group</strong></button>
        </form>
    </div>
@endsection
