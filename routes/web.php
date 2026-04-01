<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\WargaRegisterController;
use App\Http\Controllers\Ketua\WargaController;
use App\Http\Controllers\Warga\PengaduanController as WargaPengaduanController;
use App\Http\Controllers\Pengurus\PengaduanController as PengurusPengaduanController;
use App\Models\User;
use App\Models\Pengaduan;

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
            $totalWarga    = User::where('role', 'warga')->count();
            $totalPengaduan = Pengaduan::count();
            $selesai       = Pengaduan::where('status', 'selesai')->count();
            return view('ketua.dashboard', compact('totalWarga', 'totalPengaduan', 'selesai'));
        })->name('ketua.dashboard');
        Route::get('/ketua/data-warga', [WargaController::class, 'index'])->name('ketua.data-warga');
        Route::get('/ketua/pengaduan', [PengurusPengaduanController::class, 'index'])->name('ketua.pengaduan.index');
        Route::get('/ketua/pengaduan/{pengaduan}', [PengurusPengaduanController::class, 'show'])->name('ketua.pengaduan.show');
        Route::put('/ketua/pengaduan/{pengaduan}/status', [PengurusPengaduanController::class, 'updateStatus'])->name('ketua.pengaduan.status');
    });

    // Wakil RT only
    Route::middleware('checkRole:wakil')->group(function () {
        Route::get('/wakil/dashboard', fn() => view('wakil.dashboard'))->name('wakil.dashboard');
        Route::get('/wakil/pengaduan', [PengurusPengaduanController::class, 'index'])->name('wakil.pengaduan.index');
        Route::get('/wakil/pengaduan/{pengaduan}', [PengurusPengaduanController::class, 'show'])->name('wakil.pengaduan.show');
        Route::put('/wakil/pengaduan/{pengaduan}/status', [PengurusPengaduanController::class, 'updateStatus'])->name('wakil.pengaduan.status');
    });

    // Bendahara only
    Route::middleware('checkRole:bendahara')->group(function () {
        Route::get('/bendahara/dashboard', fn() => view('bendahara.dashboard'))->name('bendahara.dashboard');
    });

    // Sekretaris only
    Route::middleware('checkRole:sekretaris')->group(function () {
        Route::get('/sekretaris/dashboard', fn() => view('sekretaris.dashboard'))->name('sekretaris.dashboard');
        Route::get('/sekretaris/pengaduan', [PengurusPengaduanController::class, 'index'])->name('sekretaris.pengaduan.index');
        Route::get('/sekretaris/pengaduan/{pengaduan}', [PengurusPengaduanController::class, 'show'])->name('sekretaris.pengaduan.show');
        Route::put('/sekretaris/pengaduan/{pengaduan}/status', [PengurusPengaduanController::class, 'updateStatus'])->name('sekretaris.pengaduan.status');
    });

    // Warga only
    Route::middleware('checkRole:warga')->group(function () {
        Route::get('/warga/dashboard', fn() => view('warga.dashboard'))->name('warga.dashboard');
        Route::get('/warga/pengaduan', [WargaPengaduanController::class, 'index'])->name('warga.pengaduan.index');
        Route::get('/warga/pengaduan/create', [WargaPengaduanController::class, 'create'])->name('warga.pengaduan.create');
        Route::post('/warga/pengaduan', [WargaPengaduanController::class, 'store'])->name('warga.pengaduan.store');
        Route::get('/warga/pengaduan/{pengaduan}', [WargaPengaduanController::class, 'show'])->name('warga.pengaduan.show');
    });
});