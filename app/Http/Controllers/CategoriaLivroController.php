<?php

namespace App\Http\Controllers;

use App\Models\CategoriaLivro;
use Illuminate\Http\Request;

class CategoriaLivroController extends Controller
{
    public function index()
    {
        $categorias = CategoriaLivro::all();
        return response()->json($categorias);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|min:1',
            'livro_id' => 'required|integer|min:1',
        ]);
        $categoriaLivro = CategoriaLivro::create($data);
        return $this->success($categoriaLivro, 'Categoria cadastrada com sucesso!', 201);
    }

    public function update(Request $request, CategoriaLivro $categoriaLivro)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|min:1',
            'livro_id' => 'required|integer|min:1',
        ]);
        $categoriaLivro = CategoriaLivro::create($data);
        return $this->success($categoriaLivro, 'Categoria alterada com sucesso!');
    }

    public function destroy(CategoriaLivro $categoriaLivro)
    {
        $categoriaLivro->delete();
        return $this->success(null, 'Categoria removida com sucesso!');
    }
}
