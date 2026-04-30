<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::with('categorias')->get();
        return $this->success($livros, 'Livros listados com sucesso!');
    }

    public function show(Livro $livro)
    {
        $livro->load(['categorias', 'alugueis']);
        return $this->success($livro, 'Livro encontrado com sucesso!');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:150',
            'autor' => 'required|string|max:255',
            'data_publicacao' => 'required|date',
        ]);
        $livro = Livro::create($data);
        return $this->success($livro, 'Livro cadastrado com sucesso!',201);
    }

    public function update(Request $request, Livro $livro)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:150',
            'autor' => 'required|string|max:255',
            'data_publicacao' => 'required|date',
        ]);
        $livro->update($data);
        return $this->success($livro, 'Livro alterado com sucesso!');
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();
        return $this->success(null, 'Livro deletado com sucesso!');
    }
}
