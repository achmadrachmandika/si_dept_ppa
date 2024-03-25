<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Lp3mController;
use App\Http\Controllers\SprController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\ClosedController;
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

     Route::middleware('role:admin')->get('/laporan/closed', [ClosedController::class, 'index'])->name('laporan.closed');
    Route::middleware('role:admin')->get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/spr-convert', [SprController::class, 'sprConvert']); //buat ubah spr yang udh ada lp3m dari open ke close (cukup 1x aja)

Route::get('/ajax-autocomplete', [lp3mController::class, 'searchCode'])->name('code.search');
Route::get('/ajax-autocomplete-sparepart-code', [lp3mController::class, 'searchCodeSparepart'])->name('code.search');
Route::get('/ajax-autocomplete-machine-code', [SprController::class, 'searchCodeMachine'])->name('machineCode.search');

Route::post('/filter-spr', [SprController::class, 'filterSPR'])->name('filter-spr');
Route::post('/filter-home', [HomeController::class, 'filterHome'])->name('filter-home');

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
        Route::get('/spr/index', [SprController::class, 'index'])->name('spr.index');
        Route::get('/spr/create', [SprController::class, 'create'])->name('spr.create');
        Route::post('/spr/store', [SprController::class, 'store'])->name('spr.store');
        Route::get('/spr/{id}/show', [SprController::class, 'show'])->name('spr.show');
        Route::get('/spr/{id}/edit', [SprController::class, 'edit'])->name('spr.edit');
        Route::put('/spr/{id}/update', [SprController::class, 'update'])->name('spr.update');
        Route::delete('/spr/{id}/update', [SprController::class, 'destroy'])->name('spr.destroy');
        Route::get('/spr/cetak-pdf/{nomor_spr}', [SprController::class, 'cetak_pdf'])->name('spr_pdf');

    });

    Route::get('/aset/index', [asetController::class, 'index'])->name('aset.index');
        Route::get('/aset/create', [asetController::class, 'create'])->name('aset.create');
        Route::post('/aset/store', [asetController::class, 'store'])->name('aset.store');
        Route::get('/aset/{id}/edit', [asetController::class, 'edit'])->name('aset.edit');
        Route::put('/aset/{id}/update', [asetController::class, 'update'])->name('aset.update');
        Route::delete('/aset/{id}/delete', [asetController::class, 'destroy'])->name('aset.destroy');
        // Route::get('/cetak-pdf/{nomor_aset}', [asetController::class, 'cetak_pdf'])->name('aset_pdf');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
