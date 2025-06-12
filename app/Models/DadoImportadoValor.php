<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DadoImportadoValor extends Model
{
    protected $table = 'dados_importados_valores';

    protected $fillable = ['dado_id', 'coluna_id', 'valor'];

    public function dadoImportado()
    {
        return $this->belongsTo(DadoImportado::class, 'dado_id');
    }

    public function colunaLayout()
    {
        return $this->belongsTo(ColunaLayout::class, 'coluna_id');
    }
}
