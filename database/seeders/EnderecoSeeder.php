<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('enderecos')->insert([ 

        'id'                  => 1,
        'endereco_rua'        =>'Rua Quinze',
        'endereco_bairro'     =>'Maracanã',
        'endereco_cidade'     =>'Cariacica',
        'endereco_estado'     =>'ES',
        'endereco_cep'        =>'29142-888',
        'endereco_longradouro'=>'Casa'
        
        ]);
    }
}
