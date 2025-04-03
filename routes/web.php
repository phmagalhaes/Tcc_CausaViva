<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoadorController;
use App\Http\Controllers\OngController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OngController::class, 'index'])->name('index');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', [OngController::class, 'home'])->middleware('auth')->name('home');
Route::get('/ong/{id}', [OngController::class, 'show'])->name('ong.show');

Route::prefix('doador')->group(function () {
    Route::get('/cadastro', [DoadorController::class, 'create'])->name('doador.create');
    Route::post('/cadastro', [DoadorController::class, 'store'])->name('doador.store');
});

Route::prefix('ong')->group(function () {
    Route::get('/cadastro', [OngController::class, 'create'])->name('ong.create');
    Route::post('/cadastro', [OngController::class, 'store'])->name('ong.store');
});