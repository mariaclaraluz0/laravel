<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\FilmeController;

Route::get('/autores', [AutorController::class, 'listar'])
    ->name('autor.listar');

Route::post('/autores/add', [AutorController::class, 'add'])
    ->name('autor.add');

Route::get('/filmes', [FilmeController::class, 'listar'])
    ->name('filme.listar');

Route::post('/filmes/add', [FilmeController::class, 'add'])
    ->name('filme.add');