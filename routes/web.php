<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/ketua/dashboard', fn() => view('ketua.dashboard'))->name('ketua.dashboard');
    Route::get('/wakil/dashboard', fn() => view('wakil.dashboard'))->name('wakil.dashboard');
    Route::get('/bendahara/dashboard', fn() => view('bendahara.dashboard'))->name('bendahara.dashboard');
    Route::get('/sekretaris/dashboard', fn() => view('sekretaris.dashboard'))->name('sekretaris.dashboard');
    Route::get('/warga/dashboard', fn() => view('warga.dashboard'))->name('warga.dashboard');
});