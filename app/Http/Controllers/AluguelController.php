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
        $alugueis = Aluguel::create([
            'user_id' => $request['user_id'],
            'livro_id' => $request['livro_id'],
            'data_aluguel' => $request['data_aluguel'],
            'data_devolucao_prevista' => $request['data_devolucao_prevista'],
            'data_devolucao_real' => $request['data_devolucao_real']
        ]);
        return response()->json($alugueis);
    }

    public function  update(Request $request, Aluguel $alugueis)
    {
        $alugueis->update([
            'user_id' => $request['user_id'],
            'livro_id' => $request['livro_id'],
            'data_aluguel' => $request['data_aluguel'],
            'data_devolucao_prevista' => $request['data_devolucao_prevista'],
            'data_devolucao_real' => $request['data_devolucao_real']
        ]);
        return response()->json($alugueis);
    }

    public function destroy(Aluguel $alugueis)
    {
        $alugueis->delete();
        return response()->json($alugueis);
    }
}
