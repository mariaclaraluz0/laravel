<?php

namespace App\Http\Controllers;
use App\Models\Produto;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function listar(){
        $query = produto::query();
        $produtos = $query->get(); //select * from produtos
        return view('listar', compact('produtos'));
    }
        public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric'
        ]);

        Produto::create([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'preco' => $request->preco

        ]);

        return redirect()->back()->with('success', 'Produto Cadastrado com Sucesso!');
    }
    public function atualizar ($id){
        $produto = Produto::findOrFail($id); //busca pelo id
        return view('atualizar' , compact('produto'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => "required|string|max:255,$id",
            'quantidade' => 'required|string|max:255',
            'preco' => 'required|string|max:255'
        ]);

        $produto = Produto::findOrFail($id);

        $produto->nome = $request->nome;
        $produto->quantidade = $request->quantidade;
        $produto->preco = $request->preco;

        $produto->save();
        return redirect()->back()->with('success' , 'Produto atualizado com sucesso!');
}
}