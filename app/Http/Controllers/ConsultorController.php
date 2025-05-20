<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB, Hash;
use App\Models\Consultor;
use App\Models\User;

class ConsultorController extends Controller
{
    public function listagem() {
        $consultores = Consultor::getConsultores();
        return view('consultor.listagem', ['consultores' => $consultores]);
    }

    public function cadastro() {
        $promotores = DB::table('promotor')->where('status', 1)->get();
        return view('consultor.cadastro', ['promotores' => $promotores]);
    }

    public function inserirConsultor(Request $request) {
        $consultor = Consultor::create($request->all());

        if(!$consultor){
            return back()->with('error', 'Erro ao realizar cadastro do consultor!');
        }
        return redirect()->route('consultor.listagem')->with('message-success-consultor', 'Consultor cadastrado!');
    }

    public function gerarUsuario(Request $request) {
        $consultor = Consultor::find($request->id);
        $name = $consultor->nome.' '.$consultor->sobrenome;

        $user = User::create([
            'name' => $name,
            'email' => $consultor->email,
            'password' => Hash::make('123456')
        ]);

        if(!$user){
            return back()->with('error', 'Erro ao gerar usuário do consultor!');
        }
        return redirect()->route('consultor.listagem')->with('message-success-consultor', 'Usuário do consultor gerado!');
    }
}
