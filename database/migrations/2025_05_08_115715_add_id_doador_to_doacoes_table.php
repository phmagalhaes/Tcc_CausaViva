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
        Schema::table('doacoes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_doador');
            $table->foreign('id_doador')->references('id')->on('doadores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doacoes', function (Blueprint $table) {
            //
        });
    }
};
