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
        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id'); //filial_id
            $table->unsignedBigInteger('produto_id'); //produto_id
            $table->float('preco-venda', 8,2)->default(0.01); //preço de venda
            $table->integer('estoque-minimo')->default(1); //estoque mínimo 
            $table->integer('estoque-maximo')->default(1); //estoque maximo
            $table->timestamps();
        });

        //FK id da tabela PRODUTOS
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('produtos_id');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        //FK id da tabela FILIAIS
        Schema::table('filiais', function (Blueprint $table) {
            $table->unsignedBigInteger('filiais_id');
            $table->foreign('filial_id')->references('id')->on('filiais');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos_filiais');
    }
};
