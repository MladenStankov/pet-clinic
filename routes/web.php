<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('owners', OwnerController::class);
Route::resource('pets', PetController::class);
Route::resource('appointments', AppointmentController::class);

// Route::get('/owners', function () {
//     return view('owners');
// });

// Route::get('/pets', function () {
//     return view('pets');
// });

// Route::get('/appointments', function () {
//     return view('appointments');
// });

require __DIR__ . '/auth.php';
