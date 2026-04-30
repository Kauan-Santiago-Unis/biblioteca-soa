<?php

namespace App\Http\Controllers;

use App\Models\CategoriaLivro;
use Illuminate\Http\Request;

class CategoriaLivroController extends Controller
{
    public function index()
    {
        $categoriasLivros = CategoriaLivro::with(['categoria', 'livro'])->get();
        return $this->success($categoriasLivros, 'Relacionamentos listados com sucesso!');
    }

    public function show(CategoriaLivro $categoriaLivro)
    {
        $categoriaLivro->load(['categoria', 'livro']);
        return $this->success($categoriaLivro, 'Relacionamento encontrado com sucesso!');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'categoria_id' => 'required|integer|exists:categorias,id',
            'livro_id' => 'required|integer|exists:livros,id',
        ]);
        $categoriaLivro = CategoriaLivro::create($data);
        return $this->success($categoriaLivro, 'Categoria cadastrada com sucesso!', 201);
    }

    public function update(Request $request, CategoriaLivro $categoriaLivro)
    {
        $data = $request->validate([
            'categoria_id' => 'required|integer|exists:categorias,id',
            'livro_id' => 'required|integer|exists:livros,id',
        ]);
        $categoriaLivro->update($data);
        return $this->success($categoriaLivro, 'Categoria alterada com sucesso!');
    }

    public function destroy(CategoriaLivro $categoriaLivro)
    {
        $categoriaLivro->delete();
        return $this->success(null, 'Categoria removida com sucesso!');
    }
}
