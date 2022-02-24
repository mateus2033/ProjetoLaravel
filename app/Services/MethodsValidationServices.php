<?php

namespace App\Services;

use App\Repository\HalenRepository;



class MethodsValidationServices
{


    protected $halenRepository;


    public function __construct(HalenRepository $halenRepository)
    {
        $this->halenRepository = $halenRepository;

    }


    public function validaCPF($cpf, $model)
    {

        return $this->halenRepository->validarCPF($cpf, $model);

    }

    

}
