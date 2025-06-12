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
        Schema::create('dados_importados_valores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dado_id')->constrained('dados_importados')->cascadeOnDelete();
            $table->foreignId('coluna_id')->constrained('colunas_layout')->cascadeOnDelete();
            $table->text('valor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dados_importados_valores');
    }
};
