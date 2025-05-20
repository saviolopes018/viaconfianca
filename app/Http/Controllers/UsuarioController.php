<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function listagem() {
        $usuarios = User::get();
        return view('usuarios.listagem', ['usuarios' => $usuarios]);
    }

    public function resetPassword(Request $request) {
        $user = User::where('id', $request->id)->get()[0];

        if(!$user){
            return back()->with('error-resetar-senha', 'Ocorreu um erro ao redefinir a senha do usuário!');
        }

        $user->update([
            'password' => Hash::make('123456')
        ]);

        return redirect()->back()->with('message-success-usuario', 'A senha do usuário foi redefinida!');
    }

    public function minhaConta() {
        $user = User::find(Auth::user()->id);
        return view('usuarios.minhaconta', ['user' => $user]);
    }

    public function atualizarConta(Request $request) {
        $user = User::find($request->id);
        $verificaSeExisteEmail = User::where('email', $request->email)->count();

        if($verificaSeExisteEmail != 0){
            return back()->with('error', 'O email inserido já pertence a outra conta!');
        }

        if($request->password == ''){
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        }else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect()->back()->with('message-success-update', 'Os dados foram atualizados com sucesso!');
    }
}
