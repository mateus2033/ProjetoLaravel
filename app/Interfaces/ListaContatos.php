<?php

namespace App\Interfaces;

interface ListaContatos 
{

    public function validContatosAlunos($contato); 
    public function contatoRepository($contato);
    public function updateContato($contato, $user_id);
    public function deleteContato($listaContato);
    public function getContato($data);
}