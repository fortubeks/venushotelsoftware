<?php

use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\Hotel\GuestController;
use App\Http\Controllers\Dashboard\Hotel\Room\ReservationController;
use App\Http\Controllers\Dashboard\Hotel\Room\RoomCategoryController;
use App\Http\Controllers\Dashboard\Hotel\Room\RoomController;
use App\Http\Controllers\Dashboard\Hotel\VenueController;
use App\Http\Controllers\Dashboard\UserManagementController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')->as('dashboard.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');

    
    Route::prefix('hotel')->as('hotel.')->group(function () {
        Route::resource('users', UserManagementController::class);
        Route::resource('room', RoomController::class);
        Route::resource('room-category', RoomCategoryController::class);
        Route::resource('reservation', ReservationController::class);
        Route::resource('guest', GuestController::class);
        Route::resource('venue', VenueController::class);
        Route::patch('/guests/{id}/restore', [GuestController::class, 'restore'])->name('guests.restore');
        
    });

    Route::post('/send-user-login-details/{userId}', [UserManagementController::class, 'loginDetails'])->name('send-user-login-details');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
