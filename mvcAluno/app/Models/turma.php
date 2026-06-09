<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class turma extends Model
{
    protected $fillable = [
        'numSala',
        'serie'
    ];

    public function aluno(){
        return $this->hasMany(Aluno::class);
        }
    
}