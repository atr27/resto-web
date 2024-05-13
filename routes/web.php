<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Manage\RestoranController;
use App\Http\Controllers\Admin\Manage\DaftarMakananMinumanController;
use App\Http\Controllers\Admin\TransaksiController;
use Spatie\Permission\Contracts\Role;

Route::get('/', function () {
    return view('auth.login');
});

Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::prefix('manage')->middleware('auth')->group(function () {
        Route::resource('daftar_makanan_minuman', DaftarMakananMinumanController::class);
        Route::prefix('restoran')->middleware('auth')->group(function () {
            Route::get('', [RestoranController::class, 'index'])->name('restoran.index');
            Route::put('', [RestoranController::class, 'update'])->name('restoran.update');
        });
    });
    Route::prefix('transaksi')->middleware('auth')->group(function (){
        Route::get('',[TransaksiController::class,'index'])->name('transaksi.index');
        Route::get('create',[TransaksiController::class,'create'])->name('transaksi.create');
        Route::post('save',[TransaksiController::class,'save'])->name('transaksi.save');
        Route::delete('delete/{id}',[TransaksiController::class,'delete'])->name('transaksi.delete');
    });
});

require __DIR__.'/auth.php';
