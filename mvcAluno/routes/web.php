<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\alunoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/aluno/listar',[alunoController::class, 'listar'])->name('aluno.listar');


Route::get('/aluno/cadastrar', function(){
    return view ('cadastro');
})->name('aluno.cadastro');

Route:post('/aluno/salvar',[alunoController::class, 'add'])->name('aluno.salvar');