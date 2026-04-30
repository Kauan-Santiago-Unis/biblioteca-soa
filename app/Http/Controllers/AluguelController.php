<?php

namespace App\Http\Controllers;

use App\Models\Aluguel;
use Illuminate\Http\Request;

class AluguelController extends Controller
{
    public function index()
    {
        $alugueis = Aluguel::with(['user', 'livro'])->get();
        return $this->success($alugueis, 'Alugueis listados com sucesso!');
    }

    public function show(Aluguel $aluguel)
    {
        $aluguel->load(['user', 'livro']);

        return $this->success($aluguel, 'Aluguel encontrado com sucesso!');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'livro_id' => 'required|integer|exists:livros,id',
            'data_aluguel' => 'required|date',
            'data_devolucao_prevista' => 'required|date|after_or_equal:data_aluguel',
            'data_devolucao_real' => 'nullable|date|after_or_equal:data_aluguel',
        ]);
        $alugueis = Aluguel::create($data);
        return $this->success($alugueis, 'Aluguel cadastrado com sucesso!', 201);
    }

    public function  update(Request $request, Aluguel $alugueis)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'livro_id' => 'required|integer|exists:livros,id',
            'data_aluguel' => 'required|date',
            'data_devolucao_prevista' => 'required|date|after_or_equal:data_aluguel',
            'data_devolucao_real' => 'nullable|date|after_or_equal:data_aluguel',
        ]);
        $alugueis->update($data);
        return $this->success($alugueis, 'Aluguel alterado com sucesso!');
    }

    public function destroy(Aluguel $alugueis)
    {
        $alugueis->delete();
        return $this->success(null, 'Aluguel deletado com sucesso!');
    }
}
