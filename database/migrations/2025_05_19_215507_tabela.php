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
        Schema::create('tabela', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('nomeTabelaBancoParceiro');
            $table->foreignId('banco_id')->index();
            $table->string('valorMinimo');
            $table->string('valorMaximo');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabela');
    }
};
