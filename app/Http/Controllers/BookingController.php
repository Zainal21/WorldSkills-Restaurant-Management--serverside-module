<?php


namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Experience;
use App\Models\Guest;
use App\Models\Option;
use App\Models\Reservation;
use App\Models\Seating;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function getInformation(Request $request)
    {
        $exps = Experience::all();
        return view('index', compact('exps'));
    }

    public function getReservation(Request $request)
    {
        return view('booking.reservation');
    }
    public function postReservation(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'organization' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'country' => 'required|string',
            'agree' => 'required|accepted',
        ]);

        $res = new Reservation($request->all());
        $res->is_group = $request->has('agree-group');
        $res->save();

        session(['reservation_id' => $res->id]);

        return redirect()->route('booking.guests');
    }
    public function getGuests(Request $request)
    {
          $res = Reservation::find(session('reservation_id'));
          $days = Day::all();
          $seatings = Seating::all();

        return view('booking.guest', compact('res', 'days', 'seatings'));
    }
    public function postGuests(Request $request)
    {
        $res = Reservation::find(session('reservation_id'));
        $opts = Option::find($request->input('option'));

        foreach($opts as $opt) {
            Guest::insert([
                'name' => $res->name,
                'country' => $res->country,
                'option_id' => $opt->id,
                'reservation_id' => $res->id,
            ]);
        }

        return redirect()->route('booking.confirmation');
    }
    public function getConfirmation(Request $request)
    {
        $res = Reservation::find(session('reservation_id'));

        return view('booking.confirmation', compact('res'));
    }
}
