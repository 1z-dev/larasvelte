<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\AfsprakenController;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/afspraken', [AfsprakenController::class, 'index']);
    Route::get('/maak-afspraak', [AfsprakenController::class, 'create']);
    Route::post('/afspraken', [AfsprakenController::class, 'store']);
    Route::get('/afspraken/{appointment}', [AfsprakenController::class, 'show']);
    Route::patch('/afspraken/{appointment}', [AfsprakenController::class, 'update']);
    Route::delete('/afspraken/{appointment}', [AfsprakenController::class, 'destroy']);
});

Route::get('/login', [SessionController::class, 'showLogin']); 
Route::post('/login', [SessionController::class, 'storeLogin']);
Route::get('/register', [SessionController::class, 'showRegister']);
Route::post('/register', [SessionController::class, 'storeRegister']);
Route::post('/logout', [SessionController::class, 'Logout']);
