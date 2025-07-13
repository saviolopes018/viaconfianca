<?php
if (! function_exists('toFloat')) {
    /**
     * Remove símbolos e formata string numérica em float.
     */
    function toFloat(string $valor): float {
        // Remove tudo que não seja dígito, vírgula ou ponto
        $onlyNumbers = preg_replace('/[^\d\,\.]/', '', $valor);
        // Troca vírgula por ponto
        $normalized  = str_replace(',', '.', $onlyNumbers);
        return (float) $normalized;
    }
}
