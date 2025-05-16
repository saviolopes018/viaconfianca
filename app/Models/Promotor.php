<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Promotor extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    protected $table = 'promotor';

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
    ];
}
