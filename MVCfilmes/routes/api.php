<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorApiController;
use App\Http\Controllers\FilmeApiController;


//AUTORES API 

Route::get('/autores', [AutorApiController::class, 'listarApi']);

Route::post('/autores/add', [AutorApiController::class, 'addApi']);

Route::put('/autores/update/{id}', [AutorApiController::class, 'updateApi']);

Route::delete('/autores/delete/{id}', [AutorApiController::class, 'deletarApi']);

// FILMES API 

Route::get('/filmes', [FilmeApiController::class, 'listarApi']);

Route::post('/filmes/add', [FilmeApiController::class, 'addApi']);

Route::put('/filmes/update/{id}', [FilmeApiController::class, 'updateApi']);

Route::delete('/filmes/delete/{id}', [FilmeApiController::class, 'deletarApi']);