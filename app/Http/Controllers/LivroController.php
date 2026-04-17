<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::all();
        return response()->json($livros);
    }

    public function store(Request $request)
    {
        $livro = Livro::create([
            'titulo' => $request['titulo'],
            'autor' => $request['autor'],
            'data_publicacao' => $request['data_publicacao']
        ]);
        return response()->json($livro);
    }

    public function update(REQUEST $request, Livro $livro)
    {
        $livro->update([
            'titulo' => $request['titulo'],
            'autor' => $request['autor'],
            'data_publicacao' => $request['data_publicacao']
        ]);
        return response()->json($livro);
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();
        return response()->json($livro);
    }
}
