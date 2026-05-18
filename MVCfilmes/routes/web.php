<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/autores', [AutorController::class, 'listar'])
    ->name('autor.listar');

Route::post('/autores/add', [AutorController::class, 'add'])
    ->name('autor.add');



Route::get('/filmes', [FilmeController::class, 'listar'])
    ->name('filme.listar');

Route::get('/filmes/cadastro', [FilmeController::class, 'cadastro'])
    ->name('filme.cadastro');

Route::post('/filmes/add', [FilmeController::class, 'add'])
    ->name('filme.add');

Route::get('/filmes/atualizar/{id}', [FilmeController::class, 'atualizar'])
    ->name('filme.atualizar');

Route::put('/filmes/update/{id}', [FilmeController::class, 'update'])
    ->name('filme.update');

Route::delete('/filmes/delete/{id}', [FilmeController::class, 'deletar'])
    ->name('filme.deletar');
