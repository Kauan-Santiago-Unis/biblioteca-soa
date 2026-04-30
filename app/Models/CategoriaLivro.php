<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaLivro extends Model
{
    protected $table = 'categoria_livro';

    protected $fillable = [
        'livro_id',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}
