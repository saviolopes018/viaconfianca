<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Carbon;
use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    protected $fillable = ['nome', 'banco_id', 'usuario_id'];

    public function dadosImportados()
    {
        return $this->hasMany(DadoImportado::class, 'arquivo_id');
    }

    public function getArquivos() {
        return DB::table('arquivos')
            ->join('banco', 'arquivos.banco_id','=','banco.id')
            ->select('arquivos.*', 'banco.nomeBanco as banco')
            ->get();
    }
}
