<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Lp3mController;
use App\Http\Controllers\SprController;
use App\Http\Controllers\ClosedController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\MonitorController;
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
        Route::get('/crud/index', [SprController::class, 'index'])->name('spr.index');
        Route::get('/create', [SprController::class, 'create'])->name('spr.create');
        Route::post('/', [SprController::class, 'store'])->name('spr.store');
        Route::get('/{id}', [SprController::class, 'show'])->name('spr.show');
        Route::get('/{id}/edit', [SprController::class, 'edit'])->name('spr.edit');
        Route::put('/{id}', [SprController::class, 'update'])->name('spr.update');
        Route::delete('/{id}', [SprController::class, 'destroy'])->name('spr.destroy');
        Route::get('/cetak-pdf/{nomor_spr}', [SprController::class, 'cetak_pdf'])->name('spr_pdf');

    });

    Route::middleware('role:admin')->prefix('spareparts')->group(function () {
    Route::get('/', [SparepartController::class, 'index'])->name('spareparts.index');
    Route::get('/create', [SparepartController::class, 'create'])->name('spareparts.create');
    Route::post('/', [SparepartController::class, 'store'])->name('spareparts.store');
    Route::get('/{id}', [SparepartController::class, 'show'])->name('spareparts.show');
    Route::get('/{id}/edit', [SparepartController::class, 'edit'])->name('spareparts.edit');
    Route::put('/{id}', [SparepartController::class, 'update'])->name('spareparts.update');
    Route::delete('/{id}', [SparepartController::class, 'destroy'])->name('spareparts.destroy');
});

    
});


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('role:monitoring')->prefix('monitoring')->group(function () {
    Route::get('/monitor', [MonitorController::class, 'index'])->name('monitoring.monitor');
    
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // tambahkan route logout untuk pengguna monitoring
