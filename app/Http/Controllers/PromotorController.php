<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB, Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Promotor;

class PromotorController extends Controller
{
    public function listagem() {
        $promotores = DB::table('promotor')->get();
        return view('promotor.listagem', ['promotores' => $promotores]);
    }

    public function cadastro() {
        return view('promotor.cadastro');
    }

    public function inserirPromotor(Request $request) {
        $promotor = Promotor::create($request->all());

        if(!$promotor){
            return back()->with('error', 'Erro ao realizar cadastro do promotor!');
        }

        $name = $request->nome.' '.$request->sobrenome;

        $user = User::create([
            'name' => $name,
            'email' => $request->email,
            'password' => Hash::make('123456')
        ]);

        if(!$user){
            return back()->with('error', 'Erro ao criar acessos do promotor!');
        }

        return redirect()->route('promotor.listagem')->with('message-success-cadastro-promotor', 'Promotor cadastrado com sucesso!');
    }
}
