<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VehiculoController;


Route::redirect('/', '/login');


Route::resource('vehiculos', VehiculoController::class);


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');


    Route::resource('clientes', ClienteController::class);

});


require __DIR__.'/auth.php';