<?php

namespace App\Repository;

use App\Interfaces\GenericFunctionsInterface;
use App\Models\Aluno;
use App\Models\Professor;
use Exception;


class HalenRepository implements GenericFunctionsInterface
{

    protected $modeloClassAluno     = Aluno::class;
    protected $modeloClassProfessor = Professor::class;

    /**
     * Valida o CPF informado.
     * @param string $cpf
     * @param string $typeModel
     * @return $cpf|Exception
     */
    public function validarCPF(string $cpf,  string $typeModel)
    {
    
        
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        if (strlen($cpf) != 11) {
            throw new Exception("CPF inválido", 406);
        }


        if (preg_match('/(\d)\1{10}/', $cpf)) {
            throw new Exception("CPF inválido", 406);
        }

        for ($t = 9; $t < 11; $t++) {

            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                throw new Exception("CPF inválido", 406);
            }
        }

        $getCPF = $this->getCPF($cpf, $typeModel);

        if(!empty($getCPF))
        {
            throw new Exception("CPF já cadastrado.", 400);
        }

        return $cpf;


    }


    /**
     * Valida identidade do CPF no banco de dados. Com base no $typeModel passado a busca e feita na respectiva tabela.
     * @param int $cpf
     * @param string $typeModel
     * @return $cpf|null
     */
    public function getCPF(int $cpf, string $typeModel)
    {

    
        if($typeModel == "Aluno")
        {
            $cpf = $this->modeloClassAluno::where('cpf_aluno','=',$cpf)->first();
            return $cpf;
        }


        if($typeModel == "Professor")
        {
            $cpf = $this->modeloClassProfessor::where('cpf_professor','=',$cpf)->first();
            return $cpf;
        }

        return null;

    }
}
