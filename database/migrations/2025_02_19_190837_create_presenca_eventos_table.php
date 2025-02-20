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
        Schema::create('presenca_eventos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_evento');
            $table->foreign('id_evento')->references('id')->on('eventos');
            $table->unsignedBigInteger('id_doador');
            $table->foreign('id_doador')->references('id')->on('doadores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presenca_eventos');
    }
};
