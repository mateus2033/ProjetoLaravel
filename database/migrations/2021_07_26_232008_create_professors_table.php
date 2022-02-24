<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idade_professor')->unsigned();
            $table->string('formacao_professor',200);
            $table->string('cpf_professor',20);
            $table->string('instituicao_professor',150);
            $table->string('diploma_professor',150);
            $table->text('especializacao_professor',200)->nullable();
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->integer('endereco_id')->unsigned();
            $table->foreign('endereco_id')->references('id')->on('enderecos');
            $table->integer('lstacontato_id')->unsigned();
            $table->foreign('lstacontato_id')->references('id')->on('lista_contatos');

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
        Schema::dropIfExists('professors');
    }
}
