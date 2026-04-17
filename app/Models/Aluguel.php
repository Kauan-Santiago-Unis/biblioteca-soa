<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluguel extends Model
{
    protected $table = 'alugueis';

    protected $fillable = [
        'user_id',
        'livro_id',
        'data_aluguel',
        'data_devolucao_prevista',
        'data_devolucao_real'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}
