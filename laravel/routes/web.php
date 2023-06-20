<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\KostumerController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PeminjamanGalonController;
use App\Http\Controllers\RekapanController;
use App\Http\Controllers\DetailPengeluaranController;

Route::get('/',[LoginController::class, 'index'])->name('index');
Route::post('/',[LoginController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::get('/user/kelola',[AkunController::class, 'kelola'])->name('user.kelola');
    Route::post('/user/kelola',[AkunController::class, 'store'])->name('user.store');
    Route::post('/user/update/{id?}',[AkunController::class, 'update'])->name('user.update');
    Route::post('/user/remove/{id?}',[AkunController::class, 'remove'])->name('user.remove');

    Route::get('/pengeluaran/kelola',[PengeluaranController::class, 'index'])->name('pengeluaran.kelola');
    Route::post('/pengeluaran/kelola',[PengeluaranController::class, 'store'])->name('pengeluaran.store');
    Route::get('/pengeluaran/update/{id}',[PengeluaranController::class, 'update'])->name('pengeluaran.update');
    Route::get('/pengeluaran/remove/{id}',[PengeluaranController::class, 'remove'])->name('pengeluaran.remove');

    Route::get('/kostumer/kelola',[KostumerController::class, 'index'])->name('kostumer.kelola');
    Route::post('/kostumer/kelola',[KostumerController::class, 'store'])->name('kostumer.store');
    Route::post('/kostumer/update/{id}/{nama_kostumer_old}',[KostumerController::class, 'update'])->name('kostumer.update');
    Route::post('/kostumer/remove/{id}',[KostumerController::class, 'remove'])->name('kostumer.remove');

    Route::get('/penjualan/input',[PenjualanController::class, 'index'])->name('penjualan.input');
    Route::post('/penjualan/input',[PenjualanController::class, 'insert'])->name('penjualan.insert');

    Route::get('/detail_pengeluaran/form',[DetailPengeluaranController::class, 'form'])->name('detail_pengeluaran.form');
    Route::post('/detail_pengeluaran/form',[DetailPengeluaranController::class, 'store'])->name('detail_pengeluaran.store');


    Route::get('/peminjaman/form',[PeminjamanGalonController::class, 'form'])->name('peminjaman.form');
    Route::post('/peminjaman/form',[PeminjamanGalonController::class, 'insert'])->name('peminjaman.insert');
    Route::post('/peminjaman/update/{id}',[PeminjamanGalonController::class, 'update'])->name('peminjaman.update');
    Route::post('/peminjaman/delete/{id}',[PeminjamanGalonController::class, 'delete'])->name('peminjaman.delete');

    Route::get('/rekapan/semua',[RekapanController::class, 'semua'])->name('rekapan.semua');
    Route::get('/rekapan/semua/detail/{date}',[RekapanController::class, 'detail_penjualan'])->name('rekapan.semua.detail');
    Route::get('/rekapan/pengantaran',[RekapanController::class, 'pengantaran'])->name('rekapan.pengantaran');
    Route::get('/rekapan/kostumer',[RekapanController::class, 'kostumer'])->name('rekapan.kostumer');
    Route::get('/rekapan/pengeluaran',[RekapanController::class, 'pengeluaran'])->name('rekapan.pengeluaran');
    Route::get('/rekapan/pengeluaran/detail/{date}',[RekapanController::class, 'detail_pengeluaran'])->name('rekapan.pengeluaran.detail');
});