<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Autor;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function listar(Request $request)
    {
        try {
            $query = Filme::query();

            //título
            if ($request->filled('titulo')) {
                $query->where('titulo', 'like', '%' . $request->titulo . '%');
            }

            // data lanç
            if ($request->filled('data_lancamento')) {
                $query->where('data_lancamento', $request->data_lancamento);
            }

            $filmes = $query->get();

            return view('listarFilmes', compact('filmes'));

        } catch (\Exception $e) {
            return view('listarFilmes', [
                'filmes' => collect(),
                'erro' => 'Erro interno do servidor'
            ]);
        }
    }

    public function add(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'data_lancamento' => 'required|date',
            'sinopse' => 'required|string|max:500',
            'genero' => 'required|string|max:255',
            'orcamento' => 'required|numeric',
            'autor_id' => 'required|exists:autores,id'
        ]);

        Filme::create([
            'titulo' => $request->titulo,
            'data_lancamento' => $request->data_lancamento,
            'sinopse' => $request->sinopse,
            'genero' => $request->genero,
            'orcamento' => $request->orcamento,
            'autor_id' => $request->autor_id
        ]);

        return redirect()->back()
            ->with('success', 'Filme cadastrado com sucesso!');
    }

    public function atualizar($id)
    {
        $filme = Filme::findOrFail($id);

        $autores = Autor::all();

        return view('atualizarFilme', compact('filme', 'autores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'data_lancamento' => 'required|date',
            'sinopse' => 'required|string|max:500',
            'genero' => 'required|string|max:255',
            'orcamento' => 'required|numeric',
            'autor_id' => 'required|exists:autores,id'
        ]);

        $filme = Filme::findOrFail($id);

        $filme->update([
            'titulo' => $request->titulo,
            'data_lancamento' => $request->data_lancamento,
            'sinopse' => $request->sinopse,
            'genero' => $request->genero,
            'orcamento' => $request->orcamento,
            'autor_id' => $request->autor_id
        ]);

        return redirect()->route('filme.listar')
            ->with('success', 'Filme atualizado com sucesso!');
    }

    public function deletar($id)
    {
        $filme = Filme::findOrFail($id);

        $filme->delete();

        return redirect()->route('filme.listar')
            ->with('success', 'Filme deletado com sucesso!');
    }
}