<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use App\Models\Reservation;
use App\Models\Day;
use App\Models\Seating;
class BookingController extends Controller
{
    public function index(){
      return view('booking.reservation');
    }

    public function store(Request $req){
      $req->validate([
       'name' => 'required',
       'organization'=> 'nullable|string',
       'email' =>'required|email',
       'phone'=> 'nullable|numeric',
       'country'=> 'required',
        'agree' =>'required|accepted',
      ]);
      $res = new Reservation($req->all());
      $res->is_group = $req->has('agree-group');
      $res->save();

      session(['reservation_id' => $res->id]);

      return redirect(route('booking.guest'));
    }

  
}
