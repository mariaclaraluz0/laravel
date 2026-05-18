<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Autor;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function listar()
    {
        $filmes = Filme::with('autor')->get();

        return view('listarFilmes', compact('filmes'));
    }

    public function cadastro()
    {
        $autores = Autor::get();

        return view('cadastroFilme', compact('autores'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'data_lancamento' => 'required|date',
            'sinopse' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'orcamento' => 'required|numeric',
            'autor_id' => 'nullable|exists:autor,id'
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
        $autores = Autor::get();

        return view('atualizarFilme', compact('filme', 'autores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'data_lancamento' => 'required|date',
            'sinopse' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'orcamento' => 'required|numeric',
            'autor_id' => 'nullable|exists:autor,id'
        ]);

        $filme = Filme::findOrFail($id);

        $filme->titulo = $request->titulo;
        $filme->data_lancamento = $request->data_lancamento;
        $filme->sinopse = $request->sinopse;
        $filme->genero = $request->genero;
        $filme->orcamento = $request->orcamento;
        $filme->autor_id = $request->autor_id;

        $filme->save();

        return redirect()->back()
            ->with('success', 'Filme atualizado com sucesso!');
    }

    public function deletar($id)
    {
        $filme = Filme::findOrFail($id);

        $filme->delete();

        return redirect()->route('filme.listar')
            ->with('success', 'Filme excluído com sucesso!');
    }
}