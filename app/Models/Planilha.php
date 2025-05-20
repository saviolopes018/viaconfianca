<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Planilha extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    protected $table = 'planilha';

    protected $fillable = [
        'colunaPlanilha',
        'banco_id',
        'status',
    ];

    public static function getPlanilhas() {
        return DB::table('planilha')
            ->join('banco', 'planilha.banco_id','=','banco.id')
            ->select('planilha.*', 'banco.nomeBanco as bancoDescricao', 'banco.id as bancoId')
            ->get();
    }
}
