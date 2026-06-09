<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmeApiController extends Controller
{
    public function listarApi()
    {
        return response()->json(
            Filme::with('autor')->get()
        );
    }

    public function addApi(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'data_lancamento' => 'required|date',
            'sinopse' => 'required|string|max:500',
            'genero' => 'required|string|max:255',
            'orcamento' => 'required|numeric',
            'autor_id' => 'required|exists:autor,id'
        ]);

        $filme = Filme::create($request->all());

        return response()->json([
            'message' => 'Filme criado',
            'filme' => $filme
        ]);
    }

    public function updateApi(Request $request, $id)
    {
        $filme = Filme::findOrFail($id);

        $filme->update($request->all());

        return response()->json([
            'message' => 'Filme atualizado',
            'filme' => $filme
        ]);
    }

    public function deletarApi($id)
    {
        $filme = Filme::findOrFail($id);

        $filme->delete();

        return response()->json([
            'message' => 'Filme deletado'
        ]);
    }
}