<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProducaoApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// estou no api.php
// rotas para a api de sensores
Route::get('producoes',[ProducaoApiController::class, 'listarApi']);
Route::post('producao/add',[ProducaoApiController::class, 'addApi']);
Route::put('producao/atualizar/{id}',[ProducaoApiController::class, 'updateApi']);
Route::delete('producao/deletar/{id}',[ProducaoApiController::class, 'deletarApi']);