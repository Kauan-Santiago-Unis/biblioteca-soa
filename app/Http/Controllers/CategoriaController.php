<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }

    public function store(Request $request)
    {
        $categoria = Categoria::create([
            'nome' => $request['nome'],
            'descricao' => $request['descricao']
        ]);
        return response()->json($categoria);
    }

    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update([
            'nome' => $request['nome'],
            'descricao' => $request['descricao']
        ]);
        return response()->json($categoria);
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return response()->json($categoria);
    }
}
