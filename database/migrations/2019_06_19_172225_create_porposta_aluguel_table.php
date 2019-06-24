<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePorpostaAluguelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposta_aluguels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_cliente', 100);
            $table->string('email', 100);
            $table->string('telefone', 50);
            $table->string('dias', 10);
            $table->integer('barco_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposta_aluguels');
    }
}
