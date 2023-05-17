<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\KostumerController;

Route::get('/',[LoginController::class, 'index'])->name('login');
Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
Route::get('/user/kelola',[AkunController::class, 'kelola'])->name('user.kelola');
Route::get('/pengeluaran/kelola',[PengeluaranController::class, 'index'])->name('pengeluaran.kelola');
Route::get('/kostumer/kelola',[KostumerController::class, 'index'])->name('kostumer.kelola');
