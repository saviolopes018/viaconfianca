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
        Schema::create('promotor', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('email')->unique();
            $table->string('cpf');
            $table->string('telefone');
            $table->date('dataNascimento');
            $table->string('endereco');
            $table->string('cep');
            $table->string('cidade');
            $table->string('estado');
            $table->integer('tipoChavePix');
            $table->string('chave');
            $table->string('banco');
            $table->string('agencia');
            $table->string('conta');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotor');
    }
};
