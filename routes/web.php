<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoadorController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\OngController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OngController::class, 'index'])->name('index');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', [OngController::class, 'home'])->middleware('auth')->name('home');

Route::prefix('doador')->group(function () {
    Route::get('/cadastro', [DoadorController::class, 'create'])->name('doador.create');
    Route::post('/cadastro', [DoadorController::class, 'store'])->name('doador.store');
    Route::get('/perfil', [DoadorController::class, 'perfil'])->name('doador.perfil')->middleware('auth');
});

Route::prefix('ong')->group(function () {
    Route::get('/cadastro', [OngController::class, 'create'])->name('ong.create');
    Route::post('/cadastro', [OngController::class, 'store'])->name('ong.store');
    Route::get('/perfil', [OngController::class, 'perfil'])->name('ong.perfil')->middleware('auth');
    Route::put('/update', [OngController::class, 'update'])->name('ong.update')->middleware('auth');
    Route::put('/update/img', [OngController::class, 'updateimg'])->name('ong.updateimg')->middleware('auth');
    Route::put('/galeria/add', [GaleriaController::class, 'store'])->name('ong.addimg')->middleware('auth');
    Route::delete('/galeria/delete/{id}', [GaleriaController::class, 'delete'])->name('ong.removeimg')->middleware('auth');
    Route::get('/{id}', [OngController::class, 'show'])->name('ong.show');
});

Route::get('/perfil', [AuthController::class,'perfil'])->name('perfil')->middleware('auth');