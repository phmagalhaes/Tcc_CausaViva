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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ong');
            $table->foreign('id_ong')->references('id')->on('ongs');
            $table->string('nome');
            $table->longText('descricao');
            $table->string('foto');
            $table->string('cep');
            $table->string('estado');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('rua');
            $table->string('numero');
            $table->date('data');
            $table->time('horario_inicio');
            $table->time('horario_fim');
            $table->integer('quantidade_pessoas')->nullable();
            $table->decimal('valor',  total: 8, places: 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
