<?php

namespace App\Services;

use App\Repository\EnderecoRepository;
use App\Repository\ListaContatosRepository;
use App\Repository\UsuariosRepository;

class MethodsDeleteDomainServices
{

    protected $enderecoRepository;
    protected $listaContatoAluno;
    protected $listaContatoProfessor;
    protected $userRepository;


    public function __construct(UsuariosRepository $userRepository, ListaContatosRepository  $listaContato, EnderecoRepository $enderecoRepository)
    {
        
        $this->enderecoRepository  = $enderecoRepository;        
        $this->listaContato        = $listaContato; 
        $this->UsuariosRepository  = $userRepository;
     
    }


    public function deleteEndereco($endereco)
    {   
        return $this->enderecoRepository->deleteEndereco($endereco);
    }

    public function deleteContato($listaContato)
    {
        return $this->listaContato->deleteContato($listaContato);
    }

    public function deleteUser($user_id)
    {
        return $this->UsuariosRepository->deleteUser($user_id);
    }

  

    
}