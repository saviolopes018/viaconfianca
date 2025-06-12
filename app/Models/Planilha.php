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

     public function getColunasArrayAttribute(){
        return explode(';', $this->colunaPlanilha);
    }

    public static function getPlanilhas() {
        return DB::table('planilha')
            ->join('banco', 'planilha.banco_id','=','banco.id')
            ->select('planilha.*', 'banco.nomeBanco as bancoDescricao', 'banco.id as bancoId')
            ->get();
    }

    public function obterSomaBaseCalculoComissao(){
        return DB::table('dados_importados as d')
            ->join('dados_importados_valores as v', 'v.dado_id', '=', 'd.id')
            ->join('colunas_layout as c', 'c.id', '=', 'v.coluna_id')
            ->whereIn('c.nome_coluna', [
                'Valor Desembolso',
                'Base de cálculo da comissão'
            ])
            ->selectRaw("
                SUM(
                    CASE
                        WHEN
                            REPLACE(
                                REPLACE(
                                    REPLACE(
                                        REPLACE(
                                            REPLACE(TRIM(v.valor), 'R$', ''),
                                            CHAR(160), ''
                                        ),
                                        ' ', ''
                                    ),
                                    '.', ''
                                ),
                                ',', '.'
                            ) REGEXP '^[0-9]+(\\\\.[0-9]{1,2})?$'
                        THEN
                            CAST(
                                REPLACE(
                                    REPLACE(
                                        REPLACE(
                                            REPLACE(
                                                REPLACE(TRIM(v.valor), 'R$', ''),
                                                CHAR(160), ''
                                            ),
                                            ' ', ''
                                        ),
                                        '.', ''
                                    ),
                                    ',', '.'
                                ) AS DECIMAL(15,2)
                            )
                        ELSE 0
                    END
                ) AS soma_total
            ")
            ->value('soma_total') ?? 0.0;
    }

    public function obterQuantidadePropostasPaga(){
        return DB::table('dados_importados as di')
            ->join('dados_importados_valores as div', 'div.dado_id', '=', 'di.id')
            ->join('colunas_layout as cl', 'cl.id', '=', 'div.coluna_id')
            ->whereIn('div.valor', ['Paga', 'Pago'])
            ->selectRaw("
                count(*) as quantidadePropostasPaga
            ")->value('quantidadePropostasPaga');
    }
}
