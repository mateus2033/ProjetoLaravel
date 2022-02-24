<?php
namespace App\Interfaces;

interface EnderecoInterface 
{

    public function validarEndereco($data);
    public function criarEndereco(array $endereco);
    public function updateEndereco(array $endereco, $aluno_id);
    public function deleteEndereco($endereco);

}