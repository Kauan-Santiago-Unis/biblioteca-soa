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
        $data = $request->validate([
            'nome' => 'required|string|max:150',
            'descricao' => 'required|string|max:255',
        ]);
        $categoria = Categoria::create($data);
        return $this->success($categoria, 'Categoria cadastrada com sucesso!', 201);
    }

    public function update(Request $request, Categoria $categoria)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:150',
            'descricao' => 'required|string|max:255',
        ]);
        $categoria->update($data);
        return $this->success($categoria, 'Categoria alterada com sucesso!');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return $this->success(null, 'Categoria removida com sucesso!');
    }
}
