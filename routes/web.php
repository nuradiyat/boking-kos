<?php

use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// ini adalah routingan ->name() pada navigation bar akan memanggil name nya
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/find-kos', [BoardingHouseController::class, 'find'])->name('find-kos');

Route::get('/check-booking', [BookingController::class, 'check'])->name('check-booking');