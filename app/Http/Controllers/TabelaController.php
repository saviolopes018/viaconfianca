<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banco;
use App\Models\Tabela;
use App\Models\CorteComissao;
use Illuminate\Support\Str;

class TabelaController extends Controller
{
    public function listagem() {
        $tabelas = Tabela::getTabelas();
        return view('tabela.listagem', ['tabelas' => $tabelas]);
    }

    public function cadastro() {
        $bancos = Banco::get();
        return view('tabela.cadastro', ['bancos' => $bancos]);
    }

    public function inserirTabela(Request $request) {
        $tabela = Tabela::create([
            'descricao' => trim($request->descricao),
            'comissao' => trim($request->comissao),
            'banco_id' => $request->banco_id,

        ]);

        $cortes = $request->corte;

        foreach($cortes['valores'] as $corte) {
            $row = preg_split('/\s+/', trim(Str::replace('-', '', $corte)));
            CorteComissao::create([
                'tabela_id' => $tabela->id,
                'valorMinimo' => $row[0],
                'valorMaximo' => $row[1],
                'comissao' => $row[2],
            ]);
        };

        if(!$tabela) {
            return back()->with('error', 'Erro ao realizar cadastro da tabela!');
        }

        return redirect()->route('tabela.listagem')->with('message-success-cadastro-tabela', 'Tabela cadastrada!');
    }

    public function getMargemCorte(Request $request, CorteComissao $corteComissao) {
        $cortesComissoes = $corteComissao->getTabelas($request->idTabela);
        return response()->json($cortesComissoes);
    }
}
