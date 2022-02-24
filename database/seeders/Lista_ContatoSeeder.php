<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Lista_ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lista_contatos')->insert([

            'id'                  =>1,
            'celular_primario'    =>'99777-5555',
            'celular_secundario'  =>'99888-6666',
            'telefone_primario'   =>'273333-2525',
            'telefone_secundario' =>'273336-5656',
            'linkedin'            =>'mateus2033@linkedin.com'

        ]);
    }
}
