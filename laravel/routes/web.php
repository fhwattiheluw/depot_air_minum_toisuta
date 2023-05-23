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

Route::get('/',[LoginController::class, 'index'])->name('login');

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

Route::get('/user/kelola',[AkunController::class, 'kelola'])->name('user.kelola');
Route::post('/user/kelola',[AkunController::class, 'store'])->name('user.store');
Route::post('/user/update/{id?}',[AkunController::class, 'update'])->name('user.update');
Route::post('/user/remove/{id?}',[AkunController::class, 'remove'])->name('user.remove');

Route::get('/pengeluaran/kelola',[PengeluaranController::class, 'index'])->name('pengeluaran.kelola');
Route::post('/pengeluaran/kelola',[PengeluaranController::class, 'store'])->name('pengeluaran.store');

Route::get('/kostumer/kelola',[KostumerController::class, 'index'])->name('kostumer.kelola');
Route::post('/kostumer/kelola',[KostumerController::class, 'store'])->name('kostumer.store');

Route::get('/penjualan/input',[PenjualanController::class, 'index'])->name('penjualan.input');
Route::get('/pengeluaran/form',[PengeluaranController::class, 'form'])->name('pengeluaran.form');

Route::get('/peminjaman/form',[PeminjamanGalonController::class, 'form'])->name('peminjaman.form');

Route::get('/rekapan/semua',[RekapanController::class, 'semua'])->name('rekapan.semua');
Route::get('/rekapan/pengantaran',[RekapanController::class, 'pengantaran'])->name('rekapan.pengantaran');
Route::get('/rekapan/kostumer',[RekapanController::class, 'kostumer'])->name('rekapan.kostumer');
Route::get('/rekapan/pengeluaran',[RekapanController::class, 'pengeluaran'])->name('rekapan.pengeluaran');
