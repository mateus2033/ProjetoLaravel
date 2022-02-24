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
        $array['cpf_professor']            = $faker->cpf();
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
    public function test_example()
    {

        for($i=0;$i<=500;$i++){
          
            $response = $this->POST('api/professor/store',$this->geraDados());
        }
        
        $response->assertStatus(201);

    }



    /** @test */
    public function get_aluno()
    {
    
        $faker = Factory::create('pt_BR');
            
        for($i=0;$i<=100;$i++){
    
            $response = $this->JSON('GET','api/professor/show',[
    
                'id' =>  $faker->numberBetween($min = 1, $max = 10)
    
            ]);
    
        }
        $response->assertStatus(200);
    
    }




    
}
