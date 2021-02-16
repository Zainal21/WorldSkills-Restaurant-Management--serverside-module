<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
  PagesController,
  BookingController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'index']);
Route::get('/booking/reservation', [BookingController::class, 'index'])->name('booking.reservation');
Route::post('/booking/reservation', [BookingController::class, 'store'])->name('bookingreservation.save');
Route::get('/booking/guest', [BookingController::class, 'getGuest'])->name('booking.guests');