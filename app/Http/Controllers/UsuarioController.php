<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth, Hash;
use App\Models\Perfil;
use Illuminate\Support\Str;

class UsuarioController extends Controller
{
    public function listagem(User $user) {
        $usuarios = $user->getUsuarios();
        return view('usuarios.listagem', ['usuarios' => $usuarios]);
    }

    public function cadastro() {
        $perfis = Perfil::get();
        return view('usuarios.cadastro', ['perfis' => $perfis]);
    }

    public function inserirUsuario(Request $request) {
        dd($request->all());
        $user = User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 1,
            'perfis' => $request->perfis,
            'remember_token' => Str::random(60),
        ]);

        return redirect()->route('usuario.listagem')->with('message-success-usuario', 'Usuário cadastrado com sucesso!');
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

    public function inativarUsuario(Request $request) {
        $user = User::find($request->id);

        if(!$user){
            return back()->with('error-resetar-senha', 'Ocorreu um erro ao inativar usuário!');
        }

        $user->update([
            'status' => 0
        ]);

        return redirect()->back()->with('message-success-usuario', 'Usuário inativado com sucesso!');
    }

    public function ativarUsuario(Request $request) {
        $user = User::find($request->id);

        if(!$user){
            return back()->with('error-resetar-senha', 'Ocorreu um erro ao inativar usuário!');
        }

        $user->update([
            'status' => 1
        ]);

        return redirect()->back()->with('message-success-usuario', 'Usuário inativado com sucesso!');
    }
}
