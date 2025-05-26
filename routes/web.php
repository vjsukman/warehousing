<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GudangController;


Route::get('/', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::get('/gudang', [GudangController::class, 'index'])->name('gudang');
    Route::get('/gudang/create', [GudangController::class, 'create'])->name('gudang.create');
    Route::post('/gudang', [GudangController::class, 'store'])->name('gudang.store');
    Route::get('/gudang/{id}/edit', [GudangController::class, 'edit'])->name('gudang.edit');
    Route::put('/gudang/{id}', [GudangController::class, 'update'])->name('gudang.update');
    Route::delete('/gudang/{id}', [GudangController::class, 'destroy'])->name('gudang.index');
});

