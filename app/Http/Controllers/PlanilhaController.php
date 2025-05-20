<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banco;
use App\Models\Planilha;

class PlanilhaController extends Controller
{
    public function listagem() {
        $planilhas = Planilha::getPlanilhas();
        return view('banco.planilha.listagem', ['planilhas' => $planilhas]);
    }

    public function cadastro() {
        $bancos = Banco::get();
        return view('banco.planilha.cadastro', ['bancos' => $bancos]);
    }

    public function inserirPlanilha(Request $request) {
        $planilha = Planilha::create($request->all());

        if(!$planilha){
            return back()->with('error', 'Erro ao realizar cadastro da planilha!');
        }

        return redirect()->route('banco.planilha.listagem')->with('message-success-cadastro-planilha', 'Planilha cadastrada!');
    }
}
