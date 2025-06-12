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
        Schema::create('mapeamentos_colunas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coluna_id')->constrained('colunas_layout')->cascadeOnDelete();
            $table->string('nome_original');
            $table->string('nome_logico');
            $table->unsignedBigInteger('banco_id')->nullable();
            $table->timestamps();
            $table->unique(['nome_original', 'banco_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapeamentos_colunas');
    }
};
