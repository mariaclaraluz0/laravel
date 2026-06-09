<?php

return[

    'custom' => [
        'nome' => [
            'required' => 'O nome é obrigatório',
            'max' => 'O nome deve ter no máximo :max caracteres.'
        ],
        'tipo' => [
            'required' => 'O tipo do setor é obrigatório.',
            'max' => 'O tipo do setor deve ter no máximo :max caracteres.'
        ],
        'data_fabricacao' => [
            'required' => 'o campo data é obrigatorio.',
            'numeric' => 'a data te que ser numerica.'
        ],
        'quantidade' => [
            'required' => 'O campo quantidade é obrigatório.'
        ],
        'preco' =>[
            'required' => 'O preço é obrigatório.',
            'max' => 'o preço deve ter no maximo :max caracteres.'
        ]
    ],

];