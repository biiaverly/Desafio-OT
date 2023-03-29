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
        Schema::table('DadosConversoes', function (Blueprint $table) {
            $table->decimal('valorTaxaPagamento',12,4);
            $table->decimal('valorTaxaConversao',12,4);
            $table->decimal('valorBaseLiquido',12,4);
            $table->decimal('valorMoeda',12,4);
            $table->decimal('valorConvertido',12,4);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('DadosConversoes', function (Blueprint $table) {
            //
        });
    }
};
