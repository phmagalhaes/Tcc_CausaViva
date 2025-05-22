<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoacaoController;
use App\Http\Controllers\DoadorController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\OngController;
use App\Http\Controllers\PresencaEventoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OngController::class, 'index'])->name('index');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::prefix('doador')->group(function () {
    Route::get('/cadastro', [DoadorController::class, 'create'])->name('doador.create');
    Route::post('/cadastro', [DoadorController::class, 'store'])->name('doador.store');
    Route::get('/perfil', [DoadorController::class, 'perfil'])->name('doador.perfil')->middleware('auth');
    Route::put('/update', [DoadorController::class, 'update'])->name('doador.update')->middleware('auth');
    Route::put('/update/img', [DoadorController::class, 'updateimg'])->name('doador.updateimg')->middleware('auth');
    Route::get('/delete/img', [DoadorController::class, 'removeimg'])->name('doador.removeimg')->middleware('auth');
});

Route::get('/ongs', [OngController::class, 'home'])->middleware('auth')->name('home');
Route::prefix('ong')->group(function () {
    Route::get('/cadastro', [OngController::class, 'create'])->name('ong.create');
    Route::post('/cadastro', [OngController::class, 'store'])->name('ong.store');
    Route::get('/perfil', [OngController::class, 'perfil'])->name('ong.perfil')->middleware('auth');
    Route::put('/update', [OngController::class, 'update'])->name('ong.update')->middleware('auth');
    Route::put('/update/img', [OngController::class, 'updateimg'])->name('ong.updateimg')->middleware('auth');
    Route::put('/galeria/add', [GaleriaController::class, 'store'])->name('ong.addimg')->middleware('auth');
    Route::delete('/galeria/delete/{id}', [GaleriaController::class, 'delete'])->name('ong.removeimg')->middleware('auth');
    Route::get('/oauth/callback', [OngController::class, 'callback']);
    Route::get('/pagamento/{id?}', [DoacaoController::class, 'pagamento'])->name('ong.pagamento')->middleware('auth');
    Route::post('/doacao', [DoacaoController::class, 'doacao'])->name('ong.doacao')->middleware('auth');
    Route::get('/estatisticas', [OngController::class, 'estatisticas'])->name('ong.estatisticas')->middleware('auth');
    Route::get('/{id}', [OngController::class, 'show'])->name('ong.show');
});

Route::get('/eventos', [EventoController::class, 'index'])->name('evento.index')->middleware('auth');
Route::prefix('evento')->group(function(){
    Route::get('/criar', [EventoController::class, 'create'])->name('evento.create')->middleware('auth');
    Route::post('/criar', [EventoController::class, 'store'])->name('evento.store')->middleware('auth');
    Route::post('/confirmar_presenca/{id}', [PresencaEventoController::class, 'confirmar_presenca'])->name('evento.confirmar_presenca')->middleware('auth');
    Route::post('/cancelar_presenca/{id}', [PresencaEventoController::class, 'cancelar_presenca'])->name('evento.cancelar_presenca')->middleware('auth');
    Route::get('/{id}', [EventoController::class, 'show'])->name('evento.show')->middleware('auth');
});

Route::get('/perfil', [AuthController::class, 'perfil'])->name('perfil')->middleware('auth');
