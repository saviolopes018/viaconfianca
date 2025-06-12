<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banco;
use App\Models\Planilha;
use Illuminate\Support\Facades\DB;
use App\Services\XlsxToCsvConverter;
use App\Services\ImportacaoPlanilhaService;
use App\Models\Arquivo;
use App\Models\ColunaLayout;
use App\Models\DadoImportado;
use App\Models\DadoImportadoValor;

class PlanilhaController extends Controller
{
    public function listagem() {
        $planilhas = Planilha::getPlanilhas();
        return view('banco.planilha.listagem', ['planilhas' => $planilhas]);
    }

    public function cadastro() {
        $bancos = Banco::get();
        return view('banco.planilha.cadastro', ['bancos' => $bancos]);
    }

    public function inserirPlanilha(Request $request) {
        $planilha = Planilha::create($request->all());

        if(!$planilha){
            return back()->with('error', 'Erro ao realizar cadastro da planilha!');
        }

        return redirect()->route('banco.planilha.listagem')->with('message-success-cadastro-planilha', 'Planilha cadastrada!');
    }

    public function listagemDados(Arquivo $arquivo) {
        $arquivosImportados = $arquivo->getArquivos();
        return view('banco.importar.listagem', ['arquivosImportados' => $arquivosImportados]);
    }

    public function uploadDados() {
        $bancos = Banco::get();
        return view('banco.importar.cadastro', ['bancos' => $bancos]);
    }

    public function upload(Request $request, XlsxToCsvConverter $xlsxConverter){
        $file = $request->file('file');

        $ext = strtolower($file->getClientOriginalExtension());
        $path = $file->getRealPath();

        $headings = [];
        $dados = [];

        if ($ext === 'csv' || $ext === 'txt') {
            if (($handle = fopen($path, 'r')) !== false) {

                // Ler o header
                $headings = fgetcsv($handle, 0, ';');
                $headings = array_map([$this, 'limparBOM'], $headings);

                // Ler dados
                while (($row = fgetcsv($handle, 0, ';')) !== false) {
                    $dados[] = $row;
                }

                fclose($handle);
            }
        } elseif ($ext === 'xlsx') {
            $rows = $xlsxConverter->convert($path);

            if ($rows) {
                $headings = array_map([$this, 'limparBOM'], array_shift($rows)); // primeira linha
                $dados = $rows;
            }
        } else {
            return back()->with('error', 'Arquivo não suportado.');
        }

        // Chama a service para importar tudo
        $arquivoId = $this->importarArquivo(
            $headings,
            $dados,
            $file->getClientOriginalName(),
            $request->banco_id, // ou outro banco que você deseje
            auth()->id() ?? null
        );

        return redirect()->route('banco.importar.listagem')->with('message-success-importacao', 'Planilha importada com sucesso!');
    }

    public function importarArquivo(array $headings, array $dados, string $nomeArquivo, string $bancoOrigem, ?int $usuarioId = null): int
    {
        return DB::transaction(function () use ($headings, $dados, $nomeArquivo, $bancoOrigem, $usuarioId) {

            $arquivo = Arquivo::create([
                'nome' => $nomeArquivo,
                'banco_id' => $bancoOrigem,
                'usuario_id' => $usuarioId,
            ]);

            $colunaIdMap = [];

            foreach ($headings as $pos => $colunaNome) {
                $coluna = ColunaLayout::create([
                    'arquivo_id' => $arquivo->id,
                    'nome_coluna' => $colunaNome,
                    'posicao' => $pos,
                ]);

                $colunaIdMap[$pos] = $coluna->id;
            }

            // 3. Grava dados_importados + dados_importados_valores
            foreach ($dados as $linhaNumero => $linha) {
                $dado = DadoImportado::create([
                    'arquivo_id' => $arquivo->id,
                ]);

                foreach ($linha as $pos => $valor) {
                    DadoImportadoValor::create([
                        'dado_id' => $dado->id,
                        'coluna_id' => $colunaIdMap[$pos],
                        'valor' => $valor,
                    ]);
                }
            }

            return $arquivo->id;
        });
    }

    public function xlsxToArray($filePath){
    $zip = new \ZipArchive;
    if ($zip->open($filePath) === TRUE) {

        // Shared Strings
        $sharedStrings = [];
        if (($idx = $zip->locateName('xl/sharedStrings.xml')) !== false) {
            $xml = $zip->getFromIndex($idx);
            $xmlObj = simplexml_load_string($xml);
            foreach ($xmlObj->si as $si) {
                $sharedStrings[] = (string)$si->t;
            }
        }

        // Sheet 1
        if (($idx = $zip->locateName('xl/worksheets/sheet1.xml')) !== false) {
            $xml = $zip->getFromIndex($idx);
            $xmlObj = simplexml_load_string($xml);
            $rows = [];
            foreach ($xmlObj->sheetData->row as $row) {
                $rowData = [];
                foreach ($row->c as $cell) {
                    $value = null;
                    if (isset($cell->v)) {
                        $value = (string)$cell->v;
                        $type = (string)$cell['t'];
                        if ($type === 's' && is_numeric($value)) {
                            $value = $sharedStrings[(int)$value];
                        }
                    }
                    $rowData[] = $value;
                }
                $rows[] = $rowData;
            }
            $zip->close();
            return $rows;
        }
        $zip->close();
    }
    return null;
    }

    private function limparBOM($string){
        return preg_replace('/^\xEF\xBB\xBF/', '', $string);
    }
}
