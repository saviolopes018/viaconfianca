<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard() {
        $promotores = DB::table('promotor')->where('status', 1)->get();
        return view('dashboard');
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
