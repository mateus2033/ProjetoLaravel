<?php

namespace App\Entidades\EntidadeAluno;
use App\Utils\ErrosEnum;

/**
 * @property int      $idade_aluno
 * @property string   $cpf_aluno
 * @property string   $escolaridade_aluno
 * @property string   $curiosidades_aluno
 * @property string   $objetivos_aluno
 * @property string[] $menssagem
 * @property bool     $valido;
*/
class EntidadeAluno {

    private int    $idade_aluno;
    private string $cpf_aluno;
    private string $escolaridade_aluno;
    private string $curiosidades_aluno;
    private string $objetivos_aluno;
    private int    $users_id;
    public  array  $menssagem;
    public  bool   $valido;



    public function getIdadeAluno()
    {
        return $this->idade_aluno;
    }

    public function getCpfAluno()
    {
        return $this->cpf_aluno;
    }

    public function getEscolaridadeAluno()
    {
        return $this->escolaridade_aluno;
    }

    public function getCuriosidadesAluno()
    {
        return $this->curiosidades_aluno;
    }

    public function getObjetivosAluno()
    {
        return $this->objetivos_aluno;
    }


    public function setIdadeAluno($e)
    {
        $this->idade_aluno = $e;
    }

    public function setCpfAluno($e)
    {
        $this->cpf_aluno = $e;
    }

    public function setEscolaridadeAluno($e)
    {
        $this->escolaridade_aluno = $e;
    }

    public function setCuriosidadesAluno($e)
    {
        $this->curiosidades_aluno = $e;
    }

    public function setObjetivosAluno($e)
    {
        $this->objetivos_aluno = $e;
    }
    
    public function getUsuario()
    {
        return $this->users_id;
    }

    public function setUsuario($e)
    {
        $this->users_id = $e;
    }


    public static function fromJsonAlunoEntidade($data, $usuario)
    {   
        
        $self = new self();
        
        $self->validarAluno(collect($data));
        if($self->valido)
        {
            $aluno = $self->montarAluno($data,$usuario);
            return $aluno;

        } else {
            return $self;
        }
    }

    public function montarAluno($data, $usuario) 
    {

        $this->setIdadeAluno($data['idade_aluno']);
        $this->setCpfAluno($data['cpf_aluno']);   
        $this->setEscolaridadeAluno($data['escolaridade_aluno']);
        $this->setCuriosidadesAluno($data['curiosidades_aluno']);
        $this->setObjetivosAluno($data['objetivos_aluno']); 
        $this->setUsuario($usuario);
      
        $array['idade_aluno']         = $this->getIdadeAluno();
        $array['cpf_aluno']           = $this->getCpfAluno();
        $array['escolaridade_aluno']  = $this->getEscolaridadeAluno();
        $array['curiosidades_aluno']  = $this->getCuriosidadesAluno();
        $array['objetivos_aluno']     = $this->getObjetivosAluno();
        $array['users_id']            = $this->getUsuario();

        return $array;

    }


    public function validarAluno($data)
    {

        $array = [];

        $array['idade_aluno']        = $this->_idade_aluno($data->get('idade_aluno'));
        $array['cpf_aluno']          = $this->_cpf_aluno($data->get('cpf_aluno'));
        $array['escolaridade_aluno'] = $this->_escolaridade_aluno($data->get('escolaridade_aluno'));
        $array['curiosidades_aluno'] = $this->_curiosidades_aluno($data->get('curiosidades_aluno'));
        $array['objetivos_aluno']    = $this->_objetivos_aluno($data->get('objetivos_aluno'));
      
       
        $array =  array_filter($array, function($data)
        {
            return $data != null;
        });

        $state = !empty($array);
        if($state)
        {
            $this->menssagem = $array;
            $this->valido    = false;

        } else { 

            $this->menssagem = [];
            $this->valido    = true;

        }



    }



    /**
    * Recebe uma String e retorna uma String ou Null.
    * @param string 
    * @return string|null
    */
    private function _nome_aluno($nome_aluno)
    {
        if(!isset($nome_aluno))
        {
            return ErrosEnum::$required;
        }

        if(!is_string($nome_aluno))
        {
            return ErrosEnum::$olnystrings;
        }

        return null;

    }

    /**
    * Recebe uma String e retorna uma String ou Null.
    * @param string
    * @return string|null
    */
    private function _sobre_nome_aluno($sobre_nome_aluno)
    {

        if(!isset($sobre_nome_aluno))
        {
            return ErrosEnum::$required;
        }

        if(!is_string($sobre_nome_aluno))
        {
            return ErrosEnum::$olnystrings;
        }

        return null;

    }

    /**
    * Recebe uma String e retorna uma String ou Null.
    * @param int 
    * @return string|null
    */
    private function _idade_aluno($idade_aluno)
    {

        if(!isset($idade_aluno))
        {
            return ErrosEnum::$required;
        }

        if(!is_numeric($idade_aluno))
        {
            return ErrosEnum::$onlynumbers;
        }

        return null;

    }

    /**
    * Recebe uma String e retorna uma String ou Null.
    * @param string 
    * @return string|null
    */
    private function _cpf_aluno($cpf_aluno)
    {

        if(!isset($cpf_aluno))
        {
            return ErrosEnum::$required;
        }

        if(!is_string($cpf_aluno))
        {
            return ErrosEnum::$olnystrings;
        }

        return null;
    }

    /**
    * Recebe uma String e retorna uma String ou Null.
    * @param string
    * @return string|null
    */
    private function _escolaridade_aluno($escolaridade_aluno)
    {

        if(!isset($escolaridade_aluno))
        {
            return ErrosEnum::$required;
        }

        if(!is_string($escolaridade_aluno))
        {
            return ErrosEnum::$olnystrings;
        }

        return null;
    }

    /**
    * Recebe uma String e retorna uma String ou Null.
    * @param string
    * @return string|null
    */
    private function _curiosidades_aluno($curiosidades_aluno)
    {

        if(!isset($curiosidades_aluno))
        {
            return ErrosEnum::$required;
        }

        if(!is_string($curiosidades_aluno))
        {
            return ErrosEnum::$olnystrings;
        }

        return null;
    }

    /**
    * Recebe uma String e retorna uma String ou Null.
    * @param string
    * @return string|null
    */
    private function _objetivos_aluno($objetivos_aluno)
    {

        if(!isset($objetivos_aluno))
        {
            return ErrosEnum::$required;
        }

        if(!is_string($objetivos_aluno))
        {
            return ErrosEnum::$olnystrings;
        }

        return null;
    }


}