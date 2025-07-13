<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Tabela extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    protected $table = 'tabela';

    protected $fillable = [
        'descricao',
        'banco_id',
        'comissao',
        'status',
    ];

    public static function getTabelas() {
        return DB::table('tabela')
            ->join('banco', 'tabela.banco_id','=','banco.id')
            ->select('tabela.*', 'banco.nomeBanco as bancoDescricao', 'banco.id as bancoId')
            ->where('tabela.status', 1)
            ->get();
    }
}
