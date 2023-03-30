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
        Schema::create('DadosConversoes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('moedaDestino');
            $table->string('meioPagamento');
            $table->float('valorInput');
            $table->string('usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DadosConversoes');
    }
};
