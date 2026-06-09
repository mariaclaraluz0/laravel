<?php

namespace App\Http\Controllers;
use App\Models\Turma;

use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function add(Request $request){

        $request->validate([
            'numSala' => 'required|numeric|',
            'serie' => 'required|string|max:255|unique:turmas,serie'
        ]);

        Turma::create([
            'numSala' => $request->numSala,
            'serie' => $request->serie
        ]);

        return redirect()->back()->with('success', 'Turma Cadastrada com Sucesso!');
    }
}