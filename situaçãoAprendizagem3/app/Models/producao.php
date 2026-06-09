<?php
// Estou no arquivo Produto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Producao extends Model
{
    protected $fillable = [
        'nome',
        'tipo',
        'data_publicacao',
        'quantidade',
        'preco',
        'producao_id'
    ];

    public function producao(){
        return $this->belongsTo(Producoes::class);
    }

    
}