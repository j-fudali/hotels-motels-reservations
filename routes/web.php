<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationController;
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
    Route::resource('dashboard', DashboardController::class)->only('index')->name('index', 'dashboard');
    Route::resource('dashboard/reservations', ReservationController::class)->name('index', 'dashboard.reservations');
    Route::resource('dashboard/profile', UserController::class)->name('index', 'dashboard.profile');
});
Route::any('/', function () {
    return redirect('/start');
});
