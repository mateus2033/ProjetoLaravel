<?php

namespace App\Interfaces;

interface ProfessorInterface
{

    public function professorIndex($data);
    public function exibirProfessor($data);
    public function validarProfessor($data, $usuario);
    public function getProfessor($data);
    public function gerenciarProfessorStore($usuario, $endereco, $contato);
    public function relations(array $aluno, int $aluno_id, int $endereco_id, int $contato_id);
    public function professorStore(array $professor, array $usuario, array $endereco, array $contato);
    public function professorUpdate($professor, $endereco, $contato);
    public function hasProfessor($data);
    public function deleteProfessor($data);
    public function getOnlyProfessor(array $data);
}