<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
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

        $userName = Str::lower($request->nome) + '.' + Str::lower($request->sobrenome);

        $user = User::create([
            'name' => $userName,
            'email' => $request->email,
            'password' => Hash::make('123456')
        ]);

        return redirect()->route('promotor.listagem')->with('message-success-cadastro-promotor', 'Promotor cadastrado com sucesso!');
    }
}
