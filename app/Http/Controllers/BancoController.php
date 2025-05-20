<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banco;

class BancoController extends Controller
{
    public function listagem() {
        $bancos = Banco::get();
        return view('banco.listagem', ['bancos' => $bancos]);
    }

    public function cadastro() {
        return view('banco.cadastro');
    }

    public function inserirBanco(Request $request) {
        $banco = Banco::create($request->all());

        if(!$banco) {
            return back()->with('error', 'Erro ao realizar cadastro do banco!');
        }

        return redirect()->route('banco.listagem')->with('message-success-cadastro-banco', 'Banco cadastrado!');
    }
}
