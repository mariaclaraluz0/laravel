<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detalheProduto extends Model
{
    protected $table = 'detalhe_produtos'; 

    protected $fillable = [
        'descricao',
        'tamanho',
        'peso',
        'produto_id', // se for relacionado a produto
    ];

    // Relacionamento com Produto
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}