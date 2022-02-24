<?php
namespace App\Services;

use App\Repository\ListaContatosRepository;
use App\Repository\EnderecoRepository;
use App\Repository\UsuariosRepository;



class MethodsCreateDomainServices
{

    protected $alunoControle;
    protected $enderecoRepository;
    protected $contatoRepository;
    protected $contatoprofessorRepository;
    protected $usuarioRepository;
   
    public function __construct(UsuariosRepository $usuarioRepository, ListaContatosRepository $ListaContatos , EnderecoRepository $enderecoRepository)
    {
        $this->enderecoRepository          = $enderecoRepository;    
        $this->ListaContatos               = $ListaContatos;
        $this->usuarioRepository           = $usuarioRepository;

        
    }


    public function criarEndereco($endereco)
    {  
        return $this->enderecoRepository->criarEndereco($endereco);
    }

    public function criarContato($contato)
    {   
        return $this->ListaContatos->contatoRepository($contato);
    }

    public function registrarUsuario($data)
    {  
        return $this->usuarioRepository->registrarUsuario($data);
    }

    
}