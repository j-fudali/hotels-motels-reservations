<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestsReservation;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

Route::middleware('guest')->group(function () {
    Route::get('/start', function () {
        return View::make('start.start');
    })->name('start');
    Route::controller(LoginController::class)->group(function () {
        Route::post('/login', 'login');
    });
    Route::controller(RegisterController::class)->group(function () {
        Route::post('/register', 'register');
    });
});
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('offers', OffersController::class)->only(['index', 'show']);
    Route::controller(OffersController::class)->group(function () {
        Route::get('offers/{hotel_name?}/{number_of_people?}/{country?}/{province?}', 'index')->name('offers.index');
    });
    Route::resource('reservations', ReservationController::class)->only(['index', 'store', 'destroy']);
    Route::resource('profile', UserController::class)->only(['index', 'update']);
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('hotels', HotelController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::resource('hotels.rooms', RoomController::class)->only(['index', 'store', 'update', 'destroy'])->shallow();
    Route::resource('guests-reservations', GuestsReservation::class)->only(['index', 'destroy']);
});
Route::any('/', function () {
    return redirect('/start');
});
