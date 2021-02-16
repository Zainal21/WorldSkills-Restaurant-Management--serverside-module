<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function getManagement(Request $request)
    {
        $guests = Guest::all();
        return view('management.index', compact('guests'));
    }

    public function postManagement(Request $request)
    {
        return redirect()->route('management');
    }
}
