<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('colunas_layout', function (Blueprint $table) {
            $table->id();
            $table->string('nome_coluna');
            $table->foreignId('arquivo_id')->constrained('arquivos')->cascadeOnDelete();
            $table->Integer('posicao');
            $table->boolean('obrigatoria')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colunas_layout');
    }
};
