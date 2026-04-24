<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livros';
    protected $fillable = [
        'titulo',
        'autor',
        'data_publicacao'
    ];

    public function alugueis()
    {
        return $this->hasMany(Aluguel::class);
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_livro', 'livro_id', 'categoria_id');
    }


}
