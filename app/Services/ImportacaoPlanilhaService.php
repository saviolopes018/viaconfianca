<?php

// app/Services/ImportacaoPlanilhaService.php
namespace App\Services;

use App\Models\Arquivo;
use App\Models\ColunaLayout;
use App\Models\MapeamentoColuna;
use App\Models\DadoImportado;
use App\Models\DadoImportadoValor;
use Illuminate\Support\Str;

class ImportacaoPlanilhaService{
    /**
     * @param string $filePath Caminho temporário do arquivo csv/xlsx convertido
     * @param int $bancoId Banco/origem da planilha (para mapeamento)
     * @param string $nomeArquivo Nome do arquivo para registro
     */
    public function importar(string $filePath, int $bancoId, string $nomeArquivo): Arquivo
    {
        // 1. Criar registro do arquivo
        $arquivo = Arquivo::create([
            'nome' => $nomeArquivo,
            'banco_id' => $bancoId,
        ]);

        // 2. Ler cabeçalho da planilha
        $cabecalho = $this->lerCabecalho($filePath);

        // 3. Mapear colunas do cabeçalho para colunas_layout via mapeamentos_colunas
        $mapaColunas = $this->mapearColunas($cabecalho, $bancoId);

        // 4. Ler dados e salvar no banco
        $dadosLinhas = $this->lerDados($filePath);

        foreach ($dadosLinhas as $linha) {
            $dadoImportado = DadoImportado::create([
                'arquivo_id' => $arquivo->id,
            ]);

            foreach ($linha as $colunaOriginal => $valor) {
                if (isset($mapaColunas[$colunaOriginal])) {
                    DadoImportadoValor::create([
                        'dado_id' => $dadoImportado->id,
                        'nome_logico' => $mapaColunas[$colunaOriginal],
                        'valor' => $valor,
                    ]);
                }
                // else: coluna não mapeada, ignora
            }
        }

        return $arquivo;
    }

    private function lerCabecalho(string $filePath): array
    {
        // Exemplo: ler primeira linha CSV
        $handle = fopen($filePath, 'r');
        $cabecalho = fgetcsv($handle);
        fclose($handle);

        // normalize: remover BOM, trim, etc
        return array_map(fn($h) => trim($h), $cabecalho);
    }

    private function lerDados(string $filePath): array
    {
        // Exemplo: ler todas as linhas após a primeira (CSV)
        $handle = fopen($filePath, 'r');
        $dados = [];
        $linha = 0;
        while (($row = fgetcsv($handle)) !== false) {
            if ($linha++ == 0) continue; // pular cabeçalho
            $dados[] = $row;
        }
        fclose($handle);

        // retornar array associativo com cabeçalho original como chave
        // para isso, vamos precisar do cabeçalho novamente
        $cabecalho = $this->lerCabecalho($filePath);

        $resultado = [];
        foreach ($dados as $row) {
            $linhaAssoc = [];
            foreach ($cabecalho as $i => $colNome) {
                $linhaAssoc[$colNome] = $row[$i] ?? null;
            }
            $resultado[] = $linhaAssoc;
        }

        return $resultado;
    }

    private function mapearColunas(array $cabecalho, int $bancoId): array {
        $mapa = [];

        foreach ($cabecalho as $colunaOriginal) {
            $mapeamento = MapeamentoColuna::where('nome_original', $colunaOriginal)
                ->where(function($q) use ($bancoId) {
                    $q->where('banco_id', $bancoId)
                    ->orWhereNull('banco_id');
                })
                ->first();

            if ($mapeamento) {
                $mapa[$colunaOriginal] = $mapeamento->nome_logico;
            }
        }

        return $mapa;
    }
}
