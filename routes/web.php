<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/settings.php';

Route::get('/afspraken', [SessionController::class, 'index']);
Route::post('/afspraken', [SessionController::class, 'store']);
Route::get('/afspraken/[id]', [SessionController::class, 'show']);
Route::patch('/afspraken/[id]', [SessionController::class, 'update']);
Route::delete('/afspraken/[id]', [SessionController::class, 'delete']);
Route::post('/login', [SessionController::class, 'store']);
