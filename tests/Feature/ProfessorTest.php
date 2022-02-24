<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfessorTest extends TestCase
{



    public function geraDados()
    {

        $faker = Factory::create('pt_BR');
        $array = array();       
        
        $array['email']                    = $faker->unique()->safeEmail();
        $array['password']                 = $faker->password();
        $array['idade_professor']          = $faker->numberBetween($min = 10, $max = 80);
        $array['name']                     = $faker->name();
        $array['sobre_nome']               = $faker->lastName();                                
        $array['cpf_professor']            = $faker->unique()->cpf();
        $array['formacao_professor']       = $faker->text(50);
        $array['instituicao_professor']    = $faker->text(150);
        $array['diploma_professor']        = $faker->text(150);
        $array['especializacao_professor'] = $faker->text(150);
        $array['endereco_rua']             = $faker->streetName();      
        $array['endereco_bairro']          = $faker->country();
        $array['endereco_cidade']          = $faker->cityPrefix();
        $array['endereco_estado']          = $faker->stateAbbr();
        $array['endereco_cep']             = $faker->postcode();
        $array['endereco_longradouro']     = $faker->streetName();
        $array['celular_primario']         = $faker->phoneNumber(); 
        $array['celular_secundario']       = $faker->phoneNumber(); 
        $array['telefone_primario']        = $faker->phoneNumber();
        $array['telefone_secundario']      = $faker->phoneNumber();
        $array['linkedin']                 = $faker->unique()->safeEmail();

        return $array;

    }



    /** @test */
    public function creat_professor()
    {

        for($i=0;$i<=1000;$i++){
          
            $response = $this->POST('api/professor/store',$this->geraDados());
        }
        
        $response->assertStatus(201);

    }





    
}
