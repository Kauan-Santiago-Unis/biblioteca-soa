<?php

namespace App\Http\Controllers;

use App\Models\Aluguel;
use Illuminate\Http\Request;

class AluguelController extends Controller
{
    public function index()
    {
        $alugueis = Aluguel::all();
        return response()->json($alugueis);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|min:0',
            'livro_id' => 'required|integer|min:0',
            'data_aluguel' => 'required|date',
            'data_devolucao_prevista' => 'required|date',
            'data_devolucao_real' => 'required|date',
        ]);
        $alugueis = Aluguel::create($data);
        return $this->success($alugueis, 'Aluguel cadastrado com sucesso!', 201);
    }

    public function  update(Request $request, Aluguel $alugueis)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|min:1',
            'livro_id' => 'required|integer|min:1',
            'data_aluguel' => 'required|date',
            'data_devolucao_prevista' => 'required|date',
            'data_devolucao_real' => 'required|date',
        ]);
        $alugueis = Aluguel::update($data);
        return $this->success($alugueis, 'Aluguel alterado com sucesso!');
    }

    public function destroy(Aluguel $alugueis)
    {
        $alugueis->delete();
        return $this->success(null, 'Aluguel deletado com sucesso!');
    }
}
