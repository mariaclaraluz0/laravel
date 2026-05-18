<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorApiController extends Controller
{
    public function listarApi()
    {
        $autores = Autor::all();

        return response()->json($autores);
    }

    public function addApi(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'email' => 'required|string|max:255',
            'telefone' => 'required|string|max:255'
        ]);

        $autor = Autor::create([
            'nome' => $request->nome,
            'data_nascimento' => $request->data_nascimento,
            'email' => $request->email,
            'telefone' => $request->telefone
        ]);

        return response()->json([
            'message' => 'Autor criado com sucesso',
            'autor' => $autor
        ], 200);
    }

    public function updateApi(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'email' => 'required|string|max:255',
            'telefone' => 'required|string|max:255'
        ]);

        $autor = Autor::findOrFail($id);

        $autor->nome = $request->nome;
        $autor->data_nascimento = $request->data_nascimento;
        $autor->email = $request->email;
        $autor->telefone = $request->telefone;

        $autor->save();

        return response()->json([
            'message' => 'Autor atualizado',
            'autor' => $autor
        ], 200);
    }

    public function deletarApi($id)
    {
        $autor = Autor::findOrFail($id);

        $autor->delete();

        return response()->json([
            'message' => 'Autor deletado com sucesso'
        ], 200);
    }
}