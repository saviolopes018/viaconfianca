<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Consultor extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    protected $table = 'consultor';

    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'cpf',
        'telefone',
        'dataNascimento',
        'endereco',
        'cep',
        'cidade',
        'estado',
        'tipoChavePix',
        'chave',
        'banco',
        'agencia',
        'conta',
        'promotor_id'
    ];

    public static function getConsultores() {
        return DB::table('consultor')
            ->join('promotor', 'consultor.promotor_id','=','promotor.id')
            ->select('consultor.*', 'promotor.nome as nomePromotor', 'promotor.sobrenome as sobrenomePromotor')
            ->get();
    }
}
