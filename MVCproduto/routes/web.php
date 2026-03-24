<?php

use Illuminate\Support\Facades\Route;
use App\Http\produtoControllers\produtoController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/produto/listar',[produtoController::class, 'listar'])->name('produto.listar');

Route::get('/produto/cadastrar', function(){
    return view ('cadastro');
})->name('produto.cadastro');

