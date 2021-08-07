<?php

use App\Http\Controllers\BarbeariaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('barbearia', [BarbeariaController::class, 'get']);
Route::post('barbearia', [BarbeariaController::class, 'add']);
Route::delete('barbearia/{id}', [BarbeariaController::class, 'delete']);
Route::put('barbearia/{id}', [BarbeariaController::class, 'update']);
