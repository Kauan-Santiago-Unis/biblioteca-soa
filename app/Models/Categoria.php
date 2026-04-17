<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function livros()
    {
        return $this->belongsToMany(Livro::class);
    }
}
