<?php
// estou no SetorApiController.php
namespace App\Http\Controllers;
use App\Models\Producao;


use Illuminate\Http\Request;

class ProducaoApiController extends Controller
{
    public function listarApi(Request $request){
        try{
            $query = Setores::query();

            // filtro por nome
            // select * from setores where nome like %NOME%
            if($request->filled('nome')){
                $query->where('nome', 'like', '%'.$request->nome .'%');
            }
            // filtros por número do setor
            // select * from setores where num_setor = NUM_SETOR
            if($request->filled('tipo')){
                $query->where('tipo', $request->tipo);
            }

            $producoes = $query->get();

            return response()->json([
                'success' => true,
                'data' => $producoes
            ], 200);

        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    
    public function addApi(Request $request){

        try{
            $request->validate([
                'nome' => 'required|string|max:100',
                'tipo' => 'required|string|max:100',
                'data_fabricaçao' => 'required|numeric',
                'quantidade' => 'required|numeric',
                'preco' => 'required|string|max:100',
                
                // para poder ser nulo ou existir na tabela setores
            ]);

            $setor = Setores::create([
                'nome' => $request->nome,
               'tipo ' => $request->tipo,
               'data_fabricacao ' => $request->data_fabricacao,
               'quantidade ' => $request->quantidade,
               'preco ' => $request->preco,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'produto Criado',
                'producao' => $producao
            ], 200);
        }catch(\Illuminate\Validation\ValidationException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro de validação',
                'errors' => $e->errors()
            ], 422);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'errors' => $e->getMessage()
            ], 500);
        }

    }
    
    public function updateApi(Request $request, $id){
        try{
            $request->validate([
               'nome' => 'required|string|max:100',
                'tipo' => 'required|string|max:100',
                'data_fabricaçao' => 'required|numeric',
                'quantidade' => 'required|numeric',
                'preco' => 'required|string|max:100',
            ]);

            $producao = Producoes::findOrFail($id);

            $producao->nome = $request->nome;
            $producao->tipo = $request->tipo; 
            $producao->data_fabricacao = $request->data_fabricacao; 
            $producao->quantidade = $request->quantidade; 
            $producao->preco = $request->preco;  
            

            $producao->save(); // salvando no banco de dados(fazendo update)

            return response()->json([
                'message' => "produção atualizada!",
                'producao' => $producao
            ], 200);
        }catch(\Illuminate\Validation\ValidationException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro de validação',
                'errors' => $e->errors()
            ], 422);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return response()->json([
                'success' => false,
                'message' => 'produto não encontrado'
            ], 404);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function deletarApi($id){
        try{
            $setor = Setores::findOrFail($id); // buscar o setor para depois deletar
            $setor->delete(); // faz o delete no banco de dados

            return response()->json([
                'message' => "produto Deletado com Sucesso!",
            ], 200);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return response()->json([
                'success' => false,
                'message' => 'produto não encontrado'
            ], 404);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'errors' => $e->getMessage()
            ], 500);
        }
    }
}