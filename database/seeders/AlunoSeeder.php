<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alunos')->insert([

            'id'                 =>1,
            'idade_aluno'        =>475,
            'cpf_aluno'          =>'147.217.117.66',
            'escolaridade_aluno' =>'Superior-Completo',
            'curiosidades_aluno' =>'N/D',
            'objetivos_aluno'    =>'Duvidas para prova',
            'users_id'           =>1,
            'endereco_id'        =>1,
            'lstacontato_id'     =>1
            
        ]);
    }
}
