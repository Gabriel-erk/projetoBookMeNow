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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            // $table->tipo do campo(nome do campo, tamanho do campo(aqui, 100 caracteres))
            $table->string("titulo", 100);
            // por padrão o tamnaho é 255, então, caso não passe o tamanho do parâmetro, será passado 255
            $table->string("imagem");
            $table->text("descricao");
            // grava a data e a hora do registro, quando atualizar, etc...
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
