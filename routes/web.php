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
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
Route::get('/lp3m', [lp3mController::class, 'index'])->name('lp3m');
Route::get('/riwayat-lp3m', [lp3mController::class, 'riwayatLp3m']);
Route::post('/create-lp3m', [lp3mController::class, 'create']);
Route::get('/show-lp3m/{id}', [lp3mController::class, 'showLp3m']);
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/pengalaman', [PengalamanController::class, 'index'])->name('pengalaman');


Route::get('/spr/crud/index', [SprController::class, 'index'])->name('spr.index');
Route::get('/spr/create', [SprController::class, 'create'])->name('spr.create');
Route::post('/spr', [SprController::class, 'store'])->name('spr.store');
Route::get('/spr/{id}', [SprController::class, 'show'])->name('spr.show');
Route::get('/spr/{id}/edit', [SprController::class, 'edit'])->name('spr.edit');
Route::put('/spr/{id}', [SprController::class, 'update'])->name('spr.update');
Route::delete('/spr/{id}', [SprController::class, 'destroy'])->name('spr.destroy');


Route::get('/ajax-autocomplete', [lp3mController::class, 'searchCode'])->name('code.search');




