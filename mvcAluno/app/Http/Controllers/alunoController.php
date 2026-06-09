<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    // LISTAR
    public function listar(){
        $alunos = Aluno::with('turma')->get();
        return view('listar', compact('alunos'));
    }

    // ABRIR FORMULÁRIO
    public function create(){
        $turmas = Turma::all();
        return view('cadastro', compact('turmas'));
    }

    // SALVAR
    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:alunos,email',
            'turma_id' => 'required|exists:turmas,id'
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'turma_id' => $request->turma_id
        ]);

         Info::create([
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'idade' => $request->idade,
            'data_nascimento' => $request->data_nascimento,
            'aluno_id' => $aluno->id
        ]);

        return redirect()->back()->with('success', 'Aluno Cadastrado com Sucesso!');
    }

    // EDITAR
    public function atualizar($id){
        $aluno = Aluno::findOrFail($id);
        $turmas = Turma::all();

        return view('atualizar', compact('aluno', 'turmas'));
    }

    // UPDATE
    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => "required|string|max:255|unique:alunos,email,$id",
            'turma_id' => 'required|exists:turmas,id'
        ]);

        $aluno = Aluno::findOrFail($id);

        $aluno->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'turma_id' => $request->turma_id
        ]);

        return redirect()->route('aluno.listar')->with('success', 'Aluno atualizado com sucesso!');
    }

    // DELETAR
    public function deletar($id){
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect()->route('aluno.listar')->with('success','Aluno excluído com sucesso!');
    }
}