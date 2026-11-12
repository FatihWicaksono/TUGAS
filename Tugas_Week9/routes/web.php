<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login-admin', function () {
    $admin = User::where('role', 'admin')->first();
    Auth::login($admin);
    return redirect('/mahasiswa');
});

Route::get('/login-petugas', function () {
    $petugas = User::where('role', 'petugas')->first();
    Auth::login($petugas);
    return redirect('/mahasiswa');
});

Route::get('/login', function () {
    return 'Silakan akses <a href="/login-admin">/login-admin</a> atau <a href="/login-petugas">/login-petugas</a> terlebih dahulu.';
})->name('login');

Route::middleware(['auth', 'role:admin,petugas'])->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    
    Route::get('/mahasiswa/{nim}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/{nim}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    
    Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/mahasiswa/{nim}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
});