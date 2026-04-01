<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\WargaRegisterController;
use App\Http\Controllers\Ketua\WargaController;
use App\Models\User;

// Root redirect
Route::get('/', function () {
    if (auth()->check()) {
        $role = auth()->user()->role;
        $route = match ($role) {
            'ketua'      => 'ketua.dashboard',
            'wakil'      => 'wakil.dashboard',
            'bendahara'  => 'bendahara.dashboard',
            'sekretaris' => 'sekretaris.dashboard',
            default      => 'warga.dashboard',
        };
        return redirect()->route($route);
    }
    return redirect()->route('login');
});

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('register', [WargaRegisterController::class, 'create'])->name('register');
    Route::post('register', [WargaRegisterController::class, 'store']);
});

// Auth Routes
Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Ketua RT only
    Route::middleware('checkRole:ketua')->group(function () {
        Route::get('/ketua/dashboard', function () {
            $totalWarga = User::where('role', 'warga')->count();
            return view('ketua.dashboard', compact('totalWarga'));
        })->name('ketua.dashboard');
        Route::get('/ketua/data-warga', [WargaController::class, 'index'])->name('ketua.data-warga');
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