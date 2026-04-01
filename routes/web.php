<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Ketua RT only
    Route::middleware('checkRole:ketua')->group(function () {
        Route::get('/ketua/dashboard', fn() => view('ketua.dashboard'))->name('ketua.dashboard');
    });

    // Wakil RT only
    Route::middleware('checkRole:wakil')->group(function () {
        Route::get('/wakil/dashboard', fn() => view('wakil.dashboard'))->name('wakil.dashboard');
    });

    // Bendahara only
    Route::middleware('checkRole:bendahara')->group(function () {
        Route::get('/bendahara/dashboard', fn() => view('bendahara.dashboard'))->name('bendahara.dashboard');
    });

    // Sekretaris only
    Route::middleware('checkRole:sekretaris')->group(function () {
        Route::get('/sekretaris/dashboard', fn() => view('sekretaris.dashboard'))->name('sekretaris.dashboard');
    });

    // Warga only
    Route::middleware('checkRole:warga')->group(function () {
        Route::get('/warga/dashboard', fn() => view('warga.dashboard'))->name('warga.dashboard');
    });
});