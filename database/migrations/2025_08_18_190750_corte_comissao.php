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
        Schema::create('corte_comissao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tabela_id');
            $table->string('comissao');
            $table->string('valorMinimo');
            $table->string('valorMaximo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corte_comissao');
    }
};
