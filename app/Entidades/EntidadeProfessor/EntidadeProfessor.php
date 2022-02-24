<?php
namespace App\Entidades\EntidadeProfessor;

use App\Utils\ErrosEnum;

/**
 *@property string $nome_professor
 *@property int    $idade_professor
 *@property string $formacao_professor
 *@property string $cpf_professor
 *@property string $instituicao_professor
 *@property string $diploma_professor
 *@property string $especializacao_professor
 *@property int    $usuario_id
 *@property string[] $menssagem
 *@property bool     $valido
*/
class EntidadeProfessor {



    private int    $idade_professor;
    private string $formacao_professor;
    private string $cpf_professor;
    private string $instituicao_professor;
    private string $diploma_professor;
    private string $especializacao_professor;
    private int    $usuario_id;
    public array   $menssagem;
    public bool    $valido;



    public function getIdadeProfessor()
    {
        return $this->idade_professor;
    }

    public function getFormacaoProfessor()
    {
        return $this->formacao_professor;
    }

    public function getCpfProfessor()
    {
        return $this->cpf_professor;
    }

    public function getInstituicaoProfessor()
    {
        return $this->instituicao_professor;
    }

    public function getDiplomaProfessor()
    {
        return $this->diploma_professor;
    }

    public function getEspecializacaoProfessor()
    {
        return $this->especializacao_professor;
    }

    public function getUsuario()
    {
        return $this->usuario_id;
    }


    public function setIdadeProfessor($e)
    {
        $this->idade_professor = $e;
    }

    public function setFormacaoProfessor($e)
    {
        $this->formacao_professor = $e;
    }

    public function setCpfProfessor($e)
    {
        $this->cpf_professor = $e;
    }

    public function setInstituicaoProfessor($e)
    {
        $this->instituicao_professor = $e;
    }

    public function setDiplomaProfessor($e)
    {
        $this->diploma_professor = $e;
    }

    public function setEspecializacaoProfessor($e)
    {
        $this->especializacao_professor = $e;
    }

    public function setUsuario($e)
    {
        $this->usuario_id = $e;
    }


    public static function fromJsonProfessor($data, $usario)
    {

        $self = new self();
        $self->valiarAludo(collect($data));

        if ($self->valido) {

            $aluno = $self->montarAluno($data, $usario);
            return $aluno;

        } else {
            return $self;
        }
    }


    public function montarAluno($data, $usario)
    {

        $this->setIdadeProfessor($data['idade_professor']);
        $this->setFormacaoProfessor($data['formacao_professor']);
        $this->setCpfProfessor($data['cpf_professor']);
        $this->setInstituicaoProfessor($data['instituicao_professor']);
        $this->setDiplomaProfessor($data['diploma_professor']);
        $this->setEspecializacaoProfessor($data['especializacao_professor']);
        $this->setUsuario($usario);

        $array = [];
        
        $array['idade_professor']           = $this->getIdadeProfessor();
        $array['formacao_professor']        = $this->getFormacaoProfessor();
        $array['cpf_professor']             = $this->getCpfProfessor();
        $array['instituicao_professor']     = $this->getInstituicaoProfessor();
        $array['diploma_professor']         = $this->getDiplomaProfessor();
        $array['especializacao_professor']  = $this->getEspecializacaoProfessor();
        $array['usuario_id']                = $this->getUsuario();

        return $array;

    }


    public function valiarAludo($data)
    {

        $array = [];

        $array['idade_professor']          = $this->_idade_professor($data->get('idade_professor'));
        $array['formacao_professor']       = $this->_formacao_professor($data->get('formacao_professor'));
        $array['cpf_professor']            = $this->_cpf_professor($data->get('cpf_professor'));
        $array['instituicao_professor']    = $this->_instituicao_professor($data->get('instituicao_professor'));
        $array['diploma_professor']        = $this->_diploma_professor($data->get('diploma_professor'));
        $array['especializacao_professor'] = $this->_especializacao_professor($data->get('especializacao_professor'));


        $array = array_filter($array, function ($data) {
            return $data != null;
        });


        $professor = !empty($array);
        if ($professor) {
            $this->menssagem = $array;
            $this->valido    = false;
        } else {

            $this->menssagem = [];
            $this->valido    = true;
        }
    }


    /**
     * @return string|null
     */
    private function _nome_professor($nome_professor)
    {

        if (!isset($nome_professor)) {
            return ErrosEnum::$required;
        }

        if (!is_string($nome_professor)) {
            return ErrosEnum::$olnystrings;
        }

        return null;
    }

    /**
     * @return string|null
     */
    private function _idade_professor($idade_professor)
    {

        if (!isset($idade_professor)) {
            return ErrosEnum::$required;
        }

        if (!is_numeric($idade_professor)) {
            return ErrosEnum::$onlynumbers;
        }

        return null;
    }

    /**
     * @return string|null
     */
    private function _formacao_professor($formacao_professor)
    {

        if (!isset($formacao_professor)) {
            return ErrosEnum::$required;
        }

        if (!is_string($formacao_professor)) {
            return ErrosEnum::$olnystrings;
        }

        return null;
    }

    /**
     * @return string|null
     */
    private function _cpf_professor($cpf_professor)
    {

        if (!isset($cpf_professor)) {
            return ErrosEnum::$onlynumbers;
        }

        if (!is_string($cpf_professor)) {
            return ErrosEnum::$olnystrings;
        }

        return null;
    }

    /**
     * @return string|null
     */
    private function _instituicao_professor($instituicao_professor)
    {

        if (!isset($instituicao_professor)) {
            return ErrosEnum::$required;
        }

        if (!is_string($instituicao_professor)) {
            return ErrosEnum::$olnystrings;
        }

        return null;
    }

    /**
     * @return string|null
     */
    private function _diploma_professor($diploma_professor)
    {

        if (!isset($diploma_professor)) {
            return ErrosEnum::$olnystrings;
        }

        if (!is_string($diploma_professor)) {
            return ErrosEnum::$olnystrings;
        }

        return null;
    }

    /**
     * @return string|null
     */
    private function _especializacao_professor($especializacao_professor)
    {

        if (!isset($especializacao_professor)) {
            return ErrosEnum::$required;
        }

        if (!is_string($especializacao_professor)) {
            return ErrosEnum::$olnystrings;
        }

        return null;
    }





}