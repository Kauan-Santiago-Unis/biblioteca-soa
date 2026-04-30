<?php

return [

    'required' => 'O campo :attribute é obrigatório.',
    'email' => 'O campo :attribute deve ser um endereço de e-mail válido.',
    'unique' => 'O campo :attribute já está em uso.',
    'string' => 'O campo :attribute deve ser um texto.',
    'integer' => 'O campo :attribute deve ser um número inteiro.',
    'date' => 'O campo :attribute deve ser uma data válida.',
    'exists' => 'O :attribute selecionado é inválido.',
    'min' => [
        'string' => 'O campo :attribute deve ter pelo menos :min caracteres.',
    ],
    'max' => [
        'string' => 'O campo :attribute não pode ter mais que :max caracteres.',
    ],
    'after_or_equal' => 'O campo :attribute deve ser uma data igual ou posterior a :date.',

    'attributes' => [
        'name' => 'nome',
        'email' => 'e-mail',
        'password' => 'senha',
        'titulo' => 'título',
        'autor' => 'autor',
        'data_publicacao' => 'data de publicação',
        'nome' => 'nome',
        'descricao' => 'descrição',
        'user_id' => 'usuário',
        'livro_id' => 'livro',
        'categoria_id' => 'categoria',
        'data_aluguel' => 'data de aluguel',
        'data_devolucao_prevista' => 'data de devolução prevista',
        'data_devolucao_real' => 'data de devolução real',
        'device_name' => 'nome do dispositivo',
    ],

];
