<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_contatos', function (Blueprint $table) {

            $table->increments('id');
            $table->string('celular_primario',20)->nullable();
            $table->string('celular_secundario',20)->nullable();
            $table->string('telefone_primario',20)->nullable();
            $table->string('telefone_secundario',20)->nullable();
            $table->string('linkedin',100)->nullable();
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
        Schema::dropIfExists('lista_contatos');
    }
}
