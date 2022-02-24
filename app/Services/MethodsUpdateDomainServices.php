<?php

namespace App\Services;

use  App\Repository\EnderecoRepository;
use  App\Repository\ListaContatosRepository;


class MethodsUpdateDomainServices
{

    protected $enderecoRepository;
    protected $contatoAlunoRepository;

    public function __construct(ListaContatosRepository $contatoAlunoRepository, EnderecoRepository $enderecoRepository)
    {
        $this->enderecoRepository         = $enderecoRepository;   
        $this->contatoAlunoRepository     = $contatoAlunoRepository;     
   
    }


    public function updateEndereco(array $endereco, int $aluno_id)
    {
        return $this->enderecoRepository->updateEndereco($endereco, $aluno_id);
    }
    
    public function updateContato(array $contato, int $aluno_id)
    {   
        return $this->contatoAlunoRepository->updateContato($contato, $aluno_id);
    }

 




    
}