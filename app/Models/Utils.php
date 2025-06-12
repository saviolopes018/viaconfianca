<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Utils extends Model
{
    public static function getLabelAtivoPorCodigo($codigo){
        return $codigo == 1 ? 'Ativo' : 'Inativo';
    }

    public static function formatarTelefone($telefone){
        $telefone = preg_replace('/[^0-9]/', '', $telefone);

        if (strlen($telefone) === 11) {
            // Formato celular com DDD: (99) 99999-9999
            return preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $telefone);
        } elseif (strlen($telefone) === 10) {
            // Formato fixo com DDD: (99) 9999-9999
            return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $telefone);
        }
    }

    public static function formataTimestamp($timestamp) {
        return Carbon::parse($timestamp, 'UTC')
                ->setTimezone('America/Sao_Paulo')
                ->format('d/m/Y H:i');
    }
}
