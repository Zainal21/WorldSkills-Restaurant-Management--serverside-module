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

// Route::get('/', [PagesController::class, 'index']);
// Route::get('/booking/reservation', [BookingController::class, 'index'])->name('booking.reservation');
// Route::post('/booking/reservation', [BookingController::class, 'store'])->name('bookingreservation.save');
// Route::get('/booking/guest/{reservation_id}', [BookingController::class, 'getGuest'])->name('booking.guests');
// Route::post('/booking/guest', [BookingController::class, 'postGuest']);


Route::get('/',  [BookingController::class,'getInformation'])->name('information');

Route::get('/booking/reservation', [BookingController::class, 'getReservation'])->name('booking.reservation');
Route::post('/booking/reservation',  [BookingController::class,'postReservation']);
Route::get('/booking/guests',  [BookingController::class,'getGuests'])->name('booking.guests');
Route::post('/booking/guests',  [BookingController::class,'postGuests']);
Route::get('/booking/confirmation',  [BookingController::class,'getConfirmation'])->name('booking.confirmation');

Route::get('/management', [ManagementController::class, 'getManagement'])->name('management');
Route::post('/management', [ManagementController::class, 'postManagement']);