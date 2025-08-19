<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class CorteComissao extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    protected $table = 'corte_comissao';

    protected $fillable = [
        'tabela_id',
        'valorMinimo',
        'valorMaximo',
        'comissao'
    ];

    public function getTabelas($idTabela) {
        return DB::table('corte_comissao')
            ->join('tabela', 'tabela.id','=','corte_comissao.tabela_id')
            ->select('corte_comissao.*', 'tabela.descricao as tabela')
            ->where('corte_comissao.tabela_id', $idTabela)
            ->get();
    }
}
