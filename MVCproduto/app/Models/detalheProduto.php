<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalheProdutos extends Model
{
    protected $table = 'DetalheProdutos';

    protected $fillable = [
        'descricao',
        'tamanho',
        'peso',
        'produto_id'
    ];

    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}