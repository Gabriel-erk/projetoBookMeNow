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
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->string("titulo", 100);
            $table->text("descricao");
            $table->integer("total_votos");
            $table->integer("qntde_votos");
            // não é necessário colocar "8,2", q nem no nosso diagrama, pois por padrão é "8,2" alterar dependendo do contexto do projeto
            $table->decimal("valor");
            $table->string("telefone", 20)->nullable();
            $table->string("celular", 20);
            $table->string("endereco");
            $table->string("numero", 10);
            $table->string("complemento", 45)->nullable();
            $table->string("bairro", 80);
            $table->string("cidade", 80);
            $table->string("estado", 2);
            $table->string("cep", 45);

            // chaves estrangeiras (FK- foreign keys)
            // "usuario_id" (utilizar o nome da tabela no singular e dpois do "_" o campo que será relacionado), para evitar possiveis erros e facilitar o processo do relacionamento entre tabelas (já que, seguindo este pequeno padrão, o laravel criará as relações "automaticamente" )
            $table->foreignId("usuario_id")->constrained();
            $table->foreignId("categoria_id")->constrained();
            // $table->foreignId("foto_id")->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};
