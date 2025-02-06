<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoadorController;
use App\Http\Controllers\OngController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OngController::class, 'home'])->name('home');
Route::get('/doador/cadastro', [DoadorController::class, 'create'])->name('doador.create');
Route::get('/ong/cadastro', [OngController::class, 'create'])->name('ong.create');
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/teste', function(){
    return view('teste');
});