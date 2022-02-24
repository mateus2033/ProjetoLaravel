<?php
namespace App\Interfaces;

interface AlunoInterface
{
 
    public function alunoIndex($data);
    public function validarAluno(array $data, int $usuario);
    public function gerenciarAlunoStore($usuario, $endereco, $contato);
    public function relations(array $aluno, int $aluno_id, int $endereco_id, int $contato_id);
    public function alunoStore(array $usuario, array $aluno, array $endereco, array  $contato);
    public function ShowAluno($data);
    public function hasAluno(array $data);
    public function alunoUpdate(array $aluno, array $endereco, array  $contato);
    public function deleteAluno($data);
}