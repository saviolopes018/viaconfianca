<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Perfil extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'perfil';

    protected $fillable = [
        'descricao'
    ];
}
