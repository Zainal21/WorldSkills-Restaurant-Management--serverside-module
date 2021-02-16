<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class PagesController extends Controller
{
    public function index()
    {
        return view('index', ['exps' => Experience::all()]);
    }
}
