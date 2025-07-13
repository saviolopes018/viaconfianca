<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parametrizacao;
use Illuminate\Support\Facades\DB;

class ParametrizacaoController extends Controller
{
    public function parametrizacao() {
        $parametrizacao = Parametrizacao::find(1);
        if ($parametrizacao->count() > 0) {
            return view('parametrizacao.parametrizacao', ['parametrizacao' => $parametrizacao]);
        }
        return;
    }

    public function inserir(Request $request) {
        return DB::transaction(function() use ($request) {
            $post = Parametrizacao::findOrFail($request->id);

            $post->fill($request->only(['metaDia','mediaProducaoDiaria', 'meta']));

            $post->save();

            $post->refresh();

            return redirect()->route('parametrizacao')->with('message-success-parametrizacao', 'Configurações definidas com sucesso!');
        });
    }
}
