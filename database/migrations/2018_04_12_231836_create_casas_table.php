<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categoria', 40);
            $table->string('tamanho', 40);
            $table->integer('tipo_id')->unsigned();
            // define uma chave estrangeira que se relaciona com marcas
            $table->foreign('tipo_id')
                  ->references('id')->on('tipos')
                  ->onDelete('restrict');            
            $table->string('modelo', 30);
            $table->smallInteger('ano');
            $table->decimal('preco', 10, 2);
            $table->decimal('diaria', 10, 2);
            $table->string('acompanhamentos');
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
        Schema::dropIfExists('casas');
    }
}
