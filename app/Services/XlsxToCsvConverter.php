<?php

namespace App\Services;

use App\Libraries\SimpleXLSX;

class XlsxToCsvConverter
{
    public function convert(string $xlsxPath): array
    {
        if ( ! file_exists($xlsxPath) ) {
            throw new \Exception("Arquivo não encontrado: $xlsxPath");
        }

        // Instancia o SimpleXLSX
        $xlsx = \App\Libraries\SimpleXLSX::parse($xlsxPath);

        if (!$xlsx) {
            throw new \Exception("Erro ao ler XLSX: " . SimpleXLSX::parseError());
        }

        $rows = [];
        foreach ($xlsx->rows() as $row) {
            $rows[] = $row;
        }

        return $rows;
    }
}
