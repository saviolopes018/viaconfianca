<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Planilha;
use App\Models\Parametrizacao;
use App\Models\CorteComissao;

class DashboardController extends Controller
{
    public function dashboard(Planilha $planilha, CorteComissao $corteComissao) {
        $promotores = DB::table('promotor')->where('status', 1)->get();
        $valorComissoesPagas = $planilha->obterSomaBaseCalculoComissao($corteComissao);
        $quantidadePropostasPagas = $planilha->obterQuantidadePropostasPaga();
        $parametrizacao = Parametrizacao::find(1);
        return view('dashboard', [
            'valorComissoesPagas' => $valorComissoesPagas,
            'quantidadePropostasPagas' => $quantidadePropostasPagas,
            'parametrizacao' => $parametrizacao
        ]);
    }

    private function notificacao($promotores) {
        $notificacoes = [];
        $dataAtual = Carbon::today();

        foreach($promotores as $promotor){
            $nascimento = Carbon::parse($promotor->dataNascimento);
            if($nascimento->isBirthday($dataAtual)){
                $notificacoes[] = "{$promotor->nome} {$promotor->sobrenome}, HOJE É SEU ANIVERSÁRIO 🥳🎈🎂";
            }
        }
        return $notificacoes;
    }
}
