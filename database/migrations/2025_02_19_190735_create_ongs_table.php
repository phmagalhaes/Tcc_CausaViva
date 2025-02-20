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
        Schema::create('ongs', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('donos');
            $table->string('email')->unique();
            $table->string('senha');
            $table->string('documento');
            $table->enum('tipo_documento', ["CPF", "CNPJ"]);
            $table->string('logo');
            $table->string('causa');
            $table->date('data_criacao');
            $table->string('cep');
            $table->string('estado');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('rua');
            $table->string('numero');
            $table->string('telefone');
            $table->longText('descricao');
            $table->string('necessidades');
            $table->decimal('meta_financeira', total: 8, places: 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ongs');
    }
};
