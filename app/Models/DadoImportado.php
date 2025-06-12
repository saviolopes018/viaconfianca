<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DadoImportado extends Model
{
    protected $table = 'dados_importados';

    protected $fillable = ['arquivo_id'];

    public function arquivo()
    {
        return $this->belongsTo(Arquivo::class, 'arquivo_id');
    }

    public function valores()
    {
        return $this->hasMany(DadoImportadoValor::class, 'dado_id');
    }
}
