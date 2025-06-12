<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapeamentoColuna extends Model
{
    protected $table = 'mapeamentos_colunas';

    protected $fillable = ['coluna_id', 'nome_original', 'banco_id'];

    public function colunaLayout()
    {
        return $this->belongsTo(ColunaLayout::class, 'coluna_id');
    }
}
