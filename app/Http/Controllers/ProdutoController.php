<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function listagem() {
        $produtos = DB::table('produto')->get();
        return view('produto.listagem', ['produtos' => $produtos]);
    }

    public function cadastro() {
        return view('produto.cadastro');
    }

    public function inserirProduto(Request $request) {
        $produto = Produto::create($request->all());

        if(!$produto) {
            return back()->with('error', 'Erro ao realizar cadastro do produto!');
        }

        return redirect()->route('produto.listagem')->with('message-success-cadastro-produto', 'Produto cadastrado!');
    }
}
