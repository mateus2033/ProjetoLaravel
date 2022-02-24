<?php

namespace App\Interfaces;

interface GenericFunctionsInterface {

   
   public function validarCPF(string $cpf, string $model);
   public function getCPF(int $cpf, string $typeModel);

}