<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function listar(Request $request)
    {
        try {
            $query = Autor::query();

            // Filtro por nome
            if ($request->filled('nome')) {
                $query->where('nome', 'like', '%' . $request->nome . '%');
            }

            // Filtro por telefone
            if ($request->filled('telefone')) {
                $query->where('telefone', 'like', '%' . $request->telefone . '%');
            }

            $autores = $query->get();

            return view('listarAutores', compact('autores'));

        } catch (\Exception $e) {

            return view('listarAutores', [
                'autores' => collect(),
                'erro' => 'Erro interno do servidor'
            ]);
        }
    }

    public function add(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:20'
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