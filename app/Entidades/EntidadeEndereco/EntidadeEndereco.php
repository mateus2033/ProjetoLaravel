<?php

namespace App\Entidades\EntidadeEndereco;

use App\Utils\ErrosEnum;

/**
 *@property string $endereco_rua
 *@property string $endereco_bairro
 *@property string $endereco_cidade
 *@property string $endereco_estado
 *@property string $endereco_cep
 *@property string $endereco_longradouro
 *@property string[] $menssagem
 *@property bool     $valido
*/
class EntidadeEndereco {


    private string $endereco_rua;
    private string $endereco_bairro;
    private string $endereco_cidade;
    private string $endereco_estado;
    private string $endereco_cep;
    private string $endereco_longradouro;    
    public  array  $menssagem;
    public  bool   $valido;
     
 
    public function getRua()
    {
        return $this->endereco_rua;
    }
 
    public function getBairro()
    {
        return $this->endereco_bairro;
    }
     
    public function getCidade()
    {
        return $this->endereco_cidade;
    }
 
    public function getEstado()
    {
        return $this->endereco_estado;
    }
 
    public function getCep()
    {
         return $this->endereco_cep;
    }
 
    public function getLongradouro()
    {
        return $this->endereco_longradouro;
    }
 
     public function setRua($e)
     {
         $this->endereco_rua = $e;
     }
 
     public function setBairro($e)
     {
         $this->endereco_bairro = $e;
     }
 
     public function setCidade($e)
     {
         $this->endereco_cidade = $e;
     }
 
     public function setEstado($e)
     {
         $this->endereco_estado = $e;
     }
  
     public function setCep($e)
     {
         $this->endereco_cep = $e;
     }
  
     public function setLongradouro($e)
     {
         $this->endereco_longradouro = $e;
     }
 
 
 
 
     public static function fromJsonEndereco($data)
     {
       
        $self = new self();
        $self->validarEndereco($data);
        
        if($self->valido)
        {
            $endereco = $self->montarEndereco($data);
            return $endereco;
 
        } else {
 
            return $self;
         
        }
 
     }
 
     /**
     * Recebe o formuladrio validado e monta um Array.
     * @return array
     */
     public function montarEndereco($data)
     {
 
         $this->setRua($data['endereco_rua']);    
         $this->setBairro($data['endereco_bairro']);
         $this->setCidade($data['endereco_cidade']);
         $this->setEstado($data['endereco_estado']);
         $this->setCep($data['endereco_cep']);
         $this->setLongradouro($data['endereco_longradouro']);
 
 
         $endereco = [];
         $endereco['endereco_rua']           = $this->getRua();
         $endereco['endereco_bairro']        = $this->getBairro();
         $endereco['endereco_cidade']        = $this->getCidade();
         $endereco['endereco_estado']        = $this->getEstado();
         $endereco['endereco_cep']           = $this->getCep();
         $endereco['endereco_longradouro']   = $this->getLongradouro();
 
         return $endereco;
 
 
     }
 
 
 
 
 
     public function validarEndereco($data)
     {
 
 
         $array = [];
 
 
         $array['endereco_rua']         = $this->_endereco_rua($data);
         $array['endereco_bairro']      = $this->_endereco_bairro($data);
         $array['endereco_cidade']      = $this->_endereco_cidade($data);
         $array['endereco_estado']      = $this->_endereco_estado($data);
         $array['endereco_cep']         = $this->_endereco_cep($data);
         $array['endereco_longradouro'] = $this->_endereco_longradouro($data);
        
         $array = array_filter($array, function($data){
             return $data !=null;
         });
        
         $endereco = !empty($array);
         if($endereco)
         {
             $this->menssagem = $array;
             $this->valido    = false;
 
         } else { 
 
             $this->menssagem = [];
             $this->valido    = true;
 
         }
 
     }
 
 
     /**
     * Receve um array e retorna uma string ou null.
     * @param array $data
     * @return string|null
     */
     private function _endereco_rua($data)
     {
         
        if(!isset($data['endereco_rua']))
        {
            return ErrosEnum::$required;
        }
 
        if(!is_string($data['endereco_rua']))
        {
            return ErrosEnum::$olnystrings;
        }
 
        return null;
 
 
     }
 
     /**
     * Receve um array e retorna uma string ou null.
     * @param array $data
     * @return string|null
     */
     private function _endereco_bairro($data)
     {
         if(!isset($data['endereco_bairro']))
         {
             return ErrosEnum::$required;
         }
 
         if(!is_string($data['endereco_bairro']))
         {
             return ErrosEnum::$olnystrings;
         }
 
         return null;
 
     }
 
     /**
     * Receve um array e retorna uma string ou null.
     * @param array $data
     * @return string|null
     */
     private function _endereco_cidade($data)
     {
         if(!isset($data['endereco_cidade']))
         {
             return ErrosEnum::$required;
         }
 
         if(!is_string($data['endereco_cidade']))
         {
             return ErrosEnum::$olnystrings;
         }
 
         return null;
 
     }
 
     /**
     * Receve um array e retorna uma string ou null.
     * @param array $data
     * @return string|null
     */
     private function _endereco_estado($data)
     {
         if(!isset($data['endereco_estado']))
         {
             return ErrosEnum::$required;
         }
 
         if(!is_string($data['endereco_estado']))
         {
             return ErrosEnum::$olnystrings;
         }
 
         return null;
 
     }
 
     /**
     * Receve um array e retorna uma string ou null.
     * @param array $data
     * @return string|null
     */
     private function _endereco_cep($data)
     {
         if(!isset($data['endereco_cep']))
         {
             return ErrosEnum::$required;
         }
 
         if(!is_string($data['endereco_cep']))
         {
             return ErrosEnum::$olnystrings;
         }
 
         return null;
 
     }
 
     /**
     * Receve um array e retorna uma string ou null.
     * @param array $data
     * @return string|null
     */
     private function _endereco_longradouro($data)
     {
         if(!isset($data['endereco_longradouro']))
         {
             return ErrosEnum::$required;
         }
 
         if(!is_string($data['endereco_longradouro']))
         {
             return ErrosEnum::$olnystrings;
         }
 
         return null;
 
     }


}