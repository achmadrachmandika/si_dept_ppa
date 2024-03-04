<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SprController;
use App\Http\Controllers\Lp3mController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard.layout.app');
});

Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

// LP3M
Route::get('/lp3m', [Lp3mController::class, 'index'])->name('lp3m');
Route::get('/riwayat-lp3m', [Lp3mController::class, 'riwayatLp3m']);
Route::post('/create-lp3m', [Lp3mController::class, 'create']);
Route::get('/show-lp3m/{id}', [Lp3mController::class, 'showLp3m']);

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// Pengalaman
Route::get('/pengalaman', [PengalamanController::class, 'index'])->name('pengalaman');

// SPR
Route::prefix('spr')->group(function () {
    Route::get('/crud/index', [SprController::class, 'index'])->name('spr.index');
    Route::get('/create', [SprController::class, 'create'])->name('spr.create');
    Route::post('/', [SprController::class, 'store'])->name('spr.store');
    Route::get('/{id}', [SprController::class, 'show'])->name('spr.show');
    Route::get('/{id}/edit', [SprController::class, 'edit'])->name('spr.edit');
    Route::put('/{id}', [SprController::class, 'update'])->name('spr.update');
    Route::delete('/{id}', [SprController::class, 'destroy'])->name('spr.destroy');
});



