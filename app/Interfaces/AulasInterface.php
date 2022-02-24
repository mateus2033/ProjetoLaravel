<?php
namespace App\Interfaces;

interface AulasInterface
{

    public function fromJsonAulas($data);
    public function salvarAula(int $professor_id, array $aulas);
    public function montarProfessor(array $aulas, int $professor_id);
    public function storeAulas($aulas);
    public function getAulas(array $aulas);
    public function deleteAulas(array $aulas, int $professor);
    public function generateDeleteAulas(int $professor, array $aulas);
    public function generateUpdateAulas(int $professor, array $aulas);
    public function updateAulas(array $aulas, int $professor);
 
}