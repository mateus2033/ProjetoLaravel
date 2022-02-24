<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aulas', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nome_aula',100);
            $table->string('nivel_aula',100);
            $table->string('descricao_aula',255);
            $table->enum('confirmacao_professor',[1,0])->nullable();
            $table->enum('confirmacao_aluno',[1,0])->nullable();
            $table->integer('professor_id')->unsigned()->nullable();
            $table->foreign('professor_id')->references('id')->on('professors');
            $table->integer('aluno_id')->unsigned()->nullable();
            $table->foreign('aluno_id')->references('id')->on('alunos');
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
        Schema::dropIfExists('aulas');
    }
}
