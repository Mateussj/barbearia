<?php

use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\BarbeariaController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\UsuarioController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('barbearia', [BarbeariaController::class, 'get']);
Route::post('barbearia', [BarbeariaController::class, 'add']);
Route::delete('barbearia/{id}', [BarbeariaController::class, 'delete']);
Route::put('barbearia/{id}', [BarbeariaController::class, 'update']);

Route::get('planos', [PlanoController::class, 'get']);
Route::post('planos', [PlanoController::class, 'add']);
Route::delete('planos/{id}', [PlanoController::class, 'delete']);
Route::put('planos/{id}', [PlanoController::class, 'update']);

Route::get('usuario', [UsuarioController::class, 'get']);
Route::post('usuario', [UsuarioController::class, 'add']);
Route::delete('usuario/{id}', [UsuarioController::class, 'delete']);
Route::put('usuario/{id}', [UsuarioController::class, 'update']);

Route::get('avaliacao', [AvaliacaoController::class, 'get']);
Route::post('avaliacao', [AvaliacaoController::class, 'add']);