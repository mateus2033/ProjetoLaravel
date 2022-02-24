<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idade_aluno')->unsigned();
            $table->string('cpf_aluno',14);
            $table->string('escolaridade_aluno',50);
            $table->text('curiosidades_aluno',150)->nullable();
            $table->text('objetivos_aluno',50);
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
        Schema::dropIfExists('alunos');
    }
}
