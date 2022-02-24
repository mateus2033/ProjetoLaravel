<?php

namespace App\Repository;

use App\Entidades\EntidadeContatos\EntidadeContatos;
use App\Interfaces\ListaContatos as InterfacesListaContatos;
use App\Models\ListaContatos;
use Exception;


class ListaContatosRepository  implements InterfacesListaContatos
{

   protected $modeloClasse = ListaContatosAlunos::class;

    public function validContatosAlunos($contato)
    {

        $fromJsonContatosAlunos = EntidadeContatos::fromJsonListaContatos($contato);
        if(!isset($fromJsonContatosAlunos->menssagem))
        {
            return $fromJsonContatosAlunos;

        } else { 

            $listaContato = json_encode($fromJsonContatosAlunos->menssagem);
            throw new Exception($listaContato, 406);
            
        }

    }

   public function contatoRepository($contato)
   {
    
    $contatovalid = $this->validContatosAlunos($contato);
    $contato = ListaContatos::create($contatovalid);
    return $contato;


   }


   public function updateContato($contato, $user_id)
   {
 
    $contato      = $this->getContato($user_id);
    $contatovalid = $this->validContatosAlunos($contato, $user_id);
    $contato->update($contatovalid);
    return $contato;

   }


   public function deleteContato($listaContato)
   {
    
    if(!$listaContato) throw new Exception("Error ao efetuar operação, CONTATO não informado.",406);
    else
    $deleteContato = ListaContatos::destroy($listaContato->id);
    return true;

   }


   public function getContato($data)
   {
    
    $contato = null;
    if(!isset($data))
    {
        throw new  Exception("Contato aluno não informado.", 404);
    }

    $contato = ListaContatos::find($data);
    if(!$contato)
    {
        throw new Exception("O Contato informado não existe.", 404);
    }

    return $contato;

   }
    
}