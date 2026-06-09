<?php

return[

    'custom' => [
        'nome' => [
            'required' => 'o nome é obrigatorio',
            'max' => 'o nome deve ser no máximo : max caracteres.'
        ],
        'num_setor'=> [
            'required' => 'o numero é obrigatorio.',
            'numeric' => 'o numero do setor deve ser numerico',
            'max' => 'o numero não pode ser maior que :max.'
        ],
        'quantidade' => [
            'required' => 'a quantidade é obrigatoria',
            'numeric' => 'o numero da quantidade deve ser numerico',
            'max' => 'a quantidade não pode ser maior que :max.'
        ],
        'valor' => [
            'required' => 'o valor é obrigatorio',
            'numeric' => 'o valor deve ser numerico',
        ],
    ],

];