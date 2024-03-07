<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Lp3mController;
use App\Http\Controllers\SprController;
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

Route::get('/', function(){
    return view('/auth/login');
})->middleware('guest');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('/ajax-autocomplete', [lp3mController::class, 'searchCode'])->name('code.search');
Route::get('/ajax-autocomplete-sparepart-code', [lp3mController::class, 'searchCodeSparepart'])->name('code.search');
Route::get('/ajax-autocomplete-machine-code', [SprController::class, 'searchCodeMachine'])->name('machineCode.search');



    // LP3M
    Route::middleware('role:admin')->get('/lp3m', [Lp3mController::class, 'index'])->name('lp3m');
    Route::middleware('role:admin')->get('/riwayat-lp3m', [Lp3mController::class, 'riwayatLp3m'])->name('riwayatLp3m');
    Route::middleware('role:admin')->post('/create-lp3m', [Lp3mController::class, 'create']);
    Route::middleware('role:admin')->get('/show-lp3m/{id}', [Lp3mController::class, 'showLp3m']);
    Route::middleware('role:admin')->get('/edit-lp3m/{id}', [Lp3mController::class, 'editLp3m']);
    Route::middleware('role:admin')->post('/update-lp3m/{id}', [Lp3mController::class, 'updateLp3m']);
    Route::middleware('role:admin')->delete('/delete-lp3m/{id}', [Lp3mController::class, 'deleteLp3m']);
    // SPR
    Route::middleware('role:admin')->prefix('spr')->group(function () {
        Route::get('/crud/index', [SprController::class, 'index'])->name('spr.index');
        Route::get('/create', [SprController::class, 'create'])->name('spr.create');
        Route::post('/', [SprController::class, 'store'])->name('spr.store');
        Route::get('/{id}', [SprController::class, 'show'])->name('spr.show');
        Route::get('/{id}/edit', [SprController::class, 'edit'])->name('spr.edit');
        Route::put('/{id}', [SprController::class, 'update'])->name('spr.update');
        Route::delete('/{id}', [SprController::class, 'destroy'])->name('spr.destroy');
        Route::get('/cetak-pdf/{nomor_spr}', [SprController::class, 'cetak_pdf'])->name('spr_pdf');

    });
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
