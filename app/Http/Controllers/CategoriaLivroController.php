<?php

namespace App\Http\Controllers;

use App\Models\CategoriaLivro;
use Illuminate\Http\Request;

class CategoriaLivroController extends Controller
{
    public function index()
    {
        $categoriasLivros = CategoriaLivro::with(['categoria', 'livro'])->get();
        return $this->success($categoriasLivros, 'Categorias de Livros listadas com sucesso!');
    }

    public function show(CategoriaLivro $categoriaLivro)
    {
        $categoriaLivro->load(['categoria', 'livro']);
        return $this->success($categoriaLivro, 'Categoria de Livro encontrada com sucesso!');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'categoria_id' => 'required|integer|exists:categorias,id',
            'livro_id' => 'required|integer|exists:livros,id',
        ]);
        $categoriaLivro = CategoriaLivro::create($data);
        return $this->success($categoriaLivro, 'Categoria de Livro cadastrada com sucesso!', 201);
    }

    public function update(Request $request, CategoriaLivro $categoriaLivro)
    {
        $data = $request->validate([
            'categoria_id' => 'required|integer|exists:categorias,id',
            'livro_id' => 'required|integer|exists:livros,id',
        ]);
        $categoriaLivro->update($data);
        return $this->success($categoriaLivro, 'Categoria de Livro alterada com sucesso!');
    }

    public function destroy(CategoriaLivro $categoriaLivro)
    {
        $categoriaLivro->delete();
        return $this->success(null, 'Categoria de Livro removida com sucesso!');
    }
}
