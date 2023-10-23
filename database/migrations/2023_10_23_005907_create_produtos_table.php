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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id(); //id
            $table->unsignedBigInteger('produto_id');
            $table->string('nome', 100); //nome
            $table->text('descricao', 150)->nullable(); //descricao
            $table->integer('peso')->nullable(); //peso
            $table->float('preco-venda', 8,2)->default(0.01); //preço de venda
            $table->integer('estoque-minimo')->default(1); //estoque mínimo
            $table->integer('estoque-maximo')->default(1); //estoque máximo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
