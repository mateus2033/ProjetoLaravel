<?php

namespace Tests\Feature;
use Faker\Factory;
use Tests\TestCase;

class AlunoTest extends TestCase
{



    public function geraDados()
    {
        $faker = Factory::create('pt_BR');
        $array = array();


        $array['name']                 = $faker->name();
        $array['sobre_nome']           = $faker->lastName();
        $array['email']                = $faker->unique()->safeEmail();
        $array['password']             = $faker->password();
        $array['idade_aluno']          = $faker->numberBetween($min = 1, $max = 10);
        $array['cpf_aluno']            = $faker->cpf();
        $array['escolaridade_aluno']   = $faker->text(50);
        $array['curiosidades_aluno']   = $faker->text(50);
        $array['objetivos_aluno']      = $faker->text(50);
        $array['endereco_rua']         = $faker->streetName();
        $array['endereco_bairro']      = $faker->country();
        $array['endereco_cidade']      = $faker->cityPrefix();
        $array['endereco_estado']      = $faker->stateAbbr();
        $array['endereco_cep']         = $faker->postcode();
        $array['endereco_longradouro'] = $faker->streetName();
        $array['celular_primario']     = $faker->phoneNumber();
        $array['celular_secundario']   = $faker->phoneNumber();
        $array['telefone_primario']    = $faker->phoneNumber();
        $array['telefone_secundario']  = $faker->phoneNumber();
        $array['linkedin']             = $faker->unique()->safeEmail();

        return $array;

    }



    /** @test */
    public function create_aluno()
    {
        
        for($i=0;$i<=50;$i++){

            $response = $this->post('api/aluno/store', $this->geraDados());

        }
        $response->assertStatus(201);

    }


    

    /** @test */
    public function get_aluno()
    {

        $faker = Factory::create('pt_BR');
        
        for($i=0;$i<=100;$i++){

            $response = $this->JSON('GET','api/aluno/show',[

                'id' =>  $faker->numberBetween($min = 1, $max = 10)

            ]);

        }
        $response->assertStatus(200);

    }


}
