<?php

namespace App\Entidades\EntidadeAulas;

use App\Utils\ErrosEnum;
use App\Utils\ValidaTempo;
use DateTime;

/**
 *@param string $nome_aula
 *@param string $nivel_aula
 *@param string $descricao_aula
 *@param enum   $confirmacao_professor
 *@param enum   $confirmacao_aluno
 *@param int    $professor_id
 *@param int    $aluno_id
 *@param string[] $menssagem
 *@param bool     $valido
 */
class EntidadeAulas {



    public string $nome_aula;
    public string $nivel_aula;
    public string $descricao_aula;
    public string $confirmacao_professor;
    public string $confirmacao_aluno;
    public string $professor_id;
    public string $aluno_id;





    public static function fromJsonAulas($data)
    {

        
        $self = new self();
        $self->validaAulas($data);
        
        if($self->valido)
        {
          $response = $self->montaAulas($data);
          return $response;
        }  
            
        return $self;

    }



    public function montaAulas($data)
    {
        

        $array = [];

        $array['nome_aula']      = $data['nome_aula'];
        $array['nivel_aula']     = $data['nivel_aula'];
        $array['descricao_aula'] = $data['descricao_aula'];
        isset($data['confirmacao_professor']) ? $array['confirmacao_professor'] = $data['confirmacao_professor'] : $array['confirmacao_professor'] = null;
        isset($data['confirmacao_aluno'])     ? $array['confirmacao_aluno']     = $data['confirmacao_aluno']     : $array['confirmacao_aluno']     = null;
        isset($data['professor_id'])          ? $array['professor_id']          = $data['professor_id']          : $array['professor_id']          = null;
        isset($data['aluno_id'])              ? $array['aluno_id']              = $data['aluno_id']              : $array['aluno_id']              = null;
        isset($data['aula_id'])               ? $array['aula_id']               = $data['aula_id']               : $array['aula_id']               = null;
         
        return $array;

    }





        /**
    * Valida os dados lista_contatos.
    * @param collect $data
    * @param int $id_aluno
    */
    public function validaAulas($data)
    {

        
        $array = [];

        $array['id']                    = $this->_aula_id($data);
        $array['nome_aula']             = $this->_nome_aula($data);
        $array['nivel_aula']            = $this->_nivel_aula($data);
        $array['descricao_aula']        = $this->_descricao_aula($data);
        $array['confirmacao_professor'] = $this->_confirmacao_professor($data);
        $array['confirmacao_aluno']     = $this->_confirmacao_aluno($data);
        $array['professor_id']          = $this->_professor_id($data);
        $array['aluno_id']              = $this->_aluno_id($data);
       
        $array = array_filter($array, function($data){
            return $data != null;
        });

        
        $contatoaluno = !empty($array);
        if($contatoaluno)
        {
            $this->menssagem = $array;
            $this->valido    = false;

        } else { 

            $this->menssagem = [];
            $this->valido    = true;
        } 



    }



    /**
    * Recebe um array e retorna uma string ou null
    * @param array $data
    * @return string|null
    */
    private function _aula_id($data)
    {

        if(!isset($data['aula_id']))
        {
            return null;
        }

        if(!is_integer($data['aula_id']))
        {
            return ErrosEnum::$onlynumbers;
        }

        return null;


    }



    /**
    * Recebe um array e retorna uma string ou null
    * @param array $data
    * @return string|null
    */
    private function _nome_aula($data)
    {

        if(!isset($data['nome_aula']))
        {
            return ErrosEnum::$required;
        }

        if(!is_string($data['nome_aula']))
        {
            return ErrosEnum::$olnystrings;
        }

        return null;


    }

    /**
    * Recebe um array e retorna uma string ou null
    * @param array $data
    * @return string|null
    */
    private function _nivel_aula($data)
    {

        if(!isset($data['nivel_aula']))
        {
            return ErrosEnum::$required;
        }

        if(!is_string($data['nivel_aula']))
        {
            return ErrosEnum::$olnystrings;
        }

        return null;

    }

    /**
    * Recebe um array e retorna uma string ou null
    * @param array $data
    * @return string|null
    */
    private function _descricao_aula($data)
    {

        if(!isset($data['descricao_aula']))
        {
            return ErrosEnum::$required;
        }    

        if(!is_string($data['descricao_aula']))
        {
            return ErrosEnum::$olnystrings;
        }

        return null;



    }


 
    /**
    * Recebe um array e retorna uma string ou null
    * @param array $data
    * @return string|null
    */
    private function _confirmacao_professor($data)
    {

        if(isset($data['confirmacao_professor']) && is_string($data['confirmacao_professor']))
        {
            return null;
        }

        return null;

    }


    /**
    * Recebe um array e retorna uma string ou null
    * @param array $data
    * @return string|null
    */
    private function _confirmacao_aluno($data)
    {

        if(isset($data['confirmacao_aluno']) && is_string($data['confirmacao_aluno']))
        {
            return null;
        }

        return null;

    }


    /**
    * Recebe um array e retorna uma string ou null
    * @param array $data
    * @return string|null
    */
    private function _professor_id($data)
    {

        if(isset($data['professor_id']) && is_integer($data['professor_id']))
        {
            return null;
        }

        return null;

    }

    /**
    * Recebe um array e retorna uma string ou null
    * @param array $data
    * @return string|null
    */
    private function _aluno_id($data)
    {

        if(isset($data['aluno_id']) && is_integer($data['aluno_id']))
        {
            return null;
        }

        return null;

    }



}