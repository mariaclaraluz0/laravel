<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function listar()
    {
        $autores = Autor::all();

        return view('listarAutores', compact('autores'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'email' => 'required|string|max:255',
            'telefone' => 'required|string|max:255'
        ]);

        Autor::create([
            'nome' => $request->nome,
            'data_nascimento' => $request->data_nascimento,
            'email' => $request->email,
            'telefone' => $request->telefone
        ]);

        return redirect()->back()
            ->with('success', 'Autor cadastrado com sucesso!');
    }
}