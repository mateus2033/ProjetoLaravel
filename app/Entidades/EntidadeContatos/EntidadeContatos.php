<?php

namespace App\Entidades\EntidadeContatos;

use App\Utils\ErrosEnum;

/**
*@param string   $celular_primario
*@param string   $celular_secundario
*@param string   $telefone_primario
*@param string   $telefone_secundario
*@param string   $linkedin
*@param string[] $menssagem
*@param bool     $valido
*/
class EntidadeContatos {


    private string $celular_primario;
    private string $celular_secundario;
    private string $telefone_primario;
    private string $telefone_secundario;
    private string $linkedin;


    public function getCelularPrimario()
    {
        return $this->celular_primario;
    }

    public function getCelularSecundario()
    {
        return $this->celular_secundario;
    }

    public function getTelefonePrimario()
    {
        return $this->telefone_primario;
    }

    public function getTelefoneSecundario()
    {
        return $this->telefone_secundario;
    }

    public function getLinkedin()
    {
        return $this->linkedin;
    }

    public function setCelularPrimario($e)
    {
        $this->celular_primario = $e;
    }

    public function setCelularSecundario($e)
    {
        $this->celular_secundario = $e;
    }

    public function setTelefonePrimario($e)
    {
        $this->telefone_primario = $e;
    }

    public function setTelefoneSecundario($e)
    {
        $this->telefone_secundario = $e;
    }

    public function setLinkedin($e)
    {
        $this->linkedin = $e;
    }


    public static function fromJsonListaContatos($data)
    {
       
        $self = new self();
        $self->validaListaContatos($data);
        if($self->valido)
        {
            $listacontato = $self->montarListaContato(collect($data));
            return $listacontato;
        }
        return $self;

    }


    /**
     * Recebe uma collect $data e uma FK $id_aluno e retornar um array
     * @param collect $data
     * @param int $id_aluno
     * @return array 
     */
    public function montarListaContato($data)
    {


        $data->get('celular_primario')    ? $this->setCelularPrimario($data ->get('celular_primario'))       : $this->setCelularPrimario("");
        $data->get('celular_secundario')  ? $this->setCelularSecundario($data->get('celular_secundario'))    : $this->setCelularSecundario("");
        $data->get('telefone_primario')   ? $this->setTelefonePrimario($data->get('telefone_primario'))      : $this->setTelefonePrimario("");
        $data->get('telefone_secundario') ? $this->setTelefoneSecundario($data->get('telefone_secundario'))  : $this->setTelefoneSecundario("");
        $data->get('linkedin')            ? $this->setLinkedin($data->get('linkedin'))                       : $this->setLinkedin("");
           
        $listacontatos = [];
        
        $listacontatos['celular_primario']    = $this->getCelularPrimario();
        $listacontatos['celular_secundario']  = $this->getCelularSecundario();
        $listacontatos['telefone_primario']   = $this->getTelefonePrimario();
        $listacontatos['telefone_secundario'] = $this->getTelefoneSecundario();
        $listacontatos['linkedin']            = $this->getLinkedin();
        
        return $listacontatos;

    }


    /**
    * Valida os dados lista_contatos.
    * @param collect $data
    * @param int $id_aluno
    */
    public function validaListaContatos($data)
    {

        $array = [];
        $array['celular_primario']    = $this->_celular_primario($data);
        $array['celular_secundario']  = $this->_celular_secundario($data);
        $array['telefone_primario']   = $this->_telefone_primario($data);
        $array['telefone_secundario'] = $this->_telefone_secundario($data);
        $array['linkedin']            = $this->_linkedin($data);
        
        
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
    private function _celular_primario($data)
    {   
        
        if(empty($data['celular_primario']))
        {
            return null;
        }

        if(!is_string($data['celular_primario']))
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
    private function _celular_secundario($data)
    {

        if(empty($data['celular_secundario']))
        {
            return null;
        }

        if(!is_string($data['celular_secundario']))
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
    private function _telefone_primario($data)
    {
        if(empty($data['telefone_primario']))
        {
            return null;
        }

        if(!is_string($data['telefone_primario']))
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
    private function _telefone_secundario($data)
    { 
        if(empty($data['telefone_secundario']))
        {
            return null;
        }

        if(!is_string($data['telefone_secundario']))
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
    private function _linkedin($data)
    { 
        if(empty($data['linkedin']))
        {
            return null;
        }

        if(!is_string($data['linkedin']))
        {
            return ErrosEnum::$olnystrings;
        }

        return null; 
    }












}