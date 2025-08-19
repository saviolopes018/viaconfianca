<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\Tabela;
use App\Models\Banco;
use Illuminate\Support\Str;
use App\Models\CorteComissao;

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
            ->where('planilha.status', 1)
            ->get();
    }

    public function obterSomaBaseCalculoComissao(CorteComissao $corteComissao){
        $valorTotalComissao = 0;

        $results = DB::select('
            SELECT
            arq.banco_id      AS banco_id,
            v.valor           AS base_comissao,
            sub.tabela        AS tabela
            FROM dados_importados       d
            JOIN arquivos                 arq ON arq.id = d.arquivo_id
            JOIN dados_importados_valores v  ON v.dado_id   = d.id
            JOIN colunas_layout         c  ON c.id         = v.coluna_id
            LEFT JOIN (
            SELECT
                v2.dado_id,
                v2.valor       AS tabela
            FROM dados_importados_valores v2
            JOIN colunas_layout         c2 ON c2.id       = v2.coluna_id
            WHERE c2.nome_coluna = "Tabela"
            ) sub ON sub.dado_id = d.id
            WHERE c.nome_coluna IN ("Valor Desembolso","Base de cálculo da comissão");
        ');
        // dd($results);

        $tabelas = Tabela::getTabelas();
        $bancos = Banco::getBancos();

        foreach($results as $result) {
            foreach($tabelas as $tabela){
                $cortesComissoes = $corteComissao->getTabelas($tabela->id);
                if($tabela->descricao == $result->tabela) {
                    foreach($cortesComissoes as $corte){
                        $baseComissao = trim(Str::replace('R$','', $result->base_comissao));

                        $valorCalculo = Str::replace(',','.', $baseComissao);

                        $valorBase    = toFloat($valorCalculo);

                        $percentual;
                        $valorTotalComissao;

                        if($corte->tabela_id == $tabela->id) {
                            // dd($corte, $valorBase);
                            if($valorBase >= $corte->valorMinimo && $valorBase <= $corte->valorMaximo){
                                $percentual = toFloat($corte->comissao);
                                $valorComissao = $valorBase * $percentual;
                                $valorTotalComissao = $valorTotalComissao + $valorComissao;

                            }
                        }
                    }
                }
            }
        }

        return $valorTotalComissao;


        // return DB::table('dados_importados as d')
        //     ->join('dados_importados_valores as v', 'v.dado_id', '=', 'd.id')
        //     ->join('colunas_layout as c', 'c.id', '=', 'v.coluna_id')
        //     ->whereIn('c.nome_coluna', [
        //         'Valor Desembolso',
        //         'Base de cálculo da comissão'
        //     ])
        //     ->selectRaw("
        //         SUM(
        //             CASE
        //                 WHEN
        //                     REPLACE(
        //                         REPLACE(
        //                             REPLACE(
        //                                 REPLACE(
        //                                     REPLACE(TRIM(v.valor), 'R$', ''),
        //                                     CHAR(160), ''
        //                                 ),
        //                                 ' ', ''
        //                             ),
        //                             '.', ''
        //                         ),
        //                         ',', '.'
        //                     ) REGEXP '^[0-9]+(\\\\.[0-9]{1,2})?$'
        //                 THEN
        //                     CAST(
        //                         REPLACE(
        //                             REPLACE(
        //                                 REPLACE(
        //                                     REPLACE(
        //                                         REPLACE(TRIM(v.valor), 'R$', ''),
        //                                         CHAR(160), ''
        //                                     ),
        //                                     ' ', ''
        //                                 ),
        //                                 '.', ''
        //                             ),
        //                             ',', '.'
        //                         ) AS DECIMAL(15,2)
        //                     )
        //                 ELSE 0
        //             END
        //         ) AS soma_total
        //     ")
        //     ->value('soma_total') ?? 0.0;
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
