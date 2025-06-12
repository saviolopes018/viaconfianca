<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColunaLayout extends Model
{
    protected $table = 'colunas_layout';

    protected $fillable = ['nome_coluna', 'arquivo_id', 'posicao', 'obrigatoria'];

    public function mapeamentos()
    {
        return $this->hasMany(MapeamentoColuna::class, 'coluna_id');
    }
}
