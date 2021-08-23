<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\BarbeariaController;
use App\Http\Controllers\EventosAgendaController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\ServicoAgendaController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;

use App\Models\Eventos_agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('usuario', [UsuarioController::class, 'get']);
Route::post('usuario', [UsuarioController::class, 'add']);
Route::delete('usuario/{id}', [UsuarioController::class, 'delete']);
Route::put('usuario/{id}', [UsuarioController::class, 'update']);

Route::get('servico', [ServicoController::class, 'get']);
Route::post('servico', [ServicoController::class, 'add']);
Route::delete('servico/{id}', [ServicoController::class, 'delete']);
Route::put('servico/{id}', [ServicoController::class, 'update']);

Route::get('agenda', [AgendaController::class, 'get']);
Route::post('agenda', [AgendaController::class, 'add']);

Route::get('avaliacao', [AvaliacaoController::class, 'get']);
Route::post('avaliacao', [AvaliacaoController::class, 'add']);

Route::get('evento-agenda', [EventosAgendaController::class, 'get']);
Route::post('evento-agenda', [EventosAgendaController::class, 'add']);
Route::put('evento-agenda/{id}', [EventosAgendaController::class, 'update']);

Route::get('servico-agenda', [ServicoAgendaController::class, 'get']);
Route::post('servico-agenda', [ServicoAgendaController::class, 'add']);
Route::delete('servico-agenda/{id}', [ServicoAgendaController::class, 'delete']);
Route::put('servico-agenda/{id}', [ServicoAgendaController::class, 'update']);

Route::group([

    'middleware' => 'api'

], function ($router) {
    Route::post('me', [AuthController::class, 'me']);
    Route::any('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
});