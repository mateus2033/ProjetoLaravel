<?php
namespace App\Entidades\EntidadeUsuario;

use App\Utils\ErrosEnum;
use Illuminate\Support\Facades\Hash;

/**
*@property string   $name
*@property string   $sobre_nome
*@property string   $email
*@property string   $password
*@property string[] $menssagem
*@property bool     $isvalid
*/
class EntidadeUsuario {


    private string $name;
    private string $sobre_nome;
    private string $email;
    private string $password;
    public  array  $menssagem;
    public  bool   $isvalid;


    public function getName()
    {
        return $this->name;
    }

    public function getSobre_nome()
    {
        return $this->sobre_nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setName($e)
    {
        $this->name = $e;
    }

    public function setSobre_nome($e)
    {
        $this->sobre_nome = $e;
    }

    public function setEmail($e)
    {
        $this->email = $e;
    }

    public function setPassword($e)
    {
        $this->password = $e;
    }


    public static function fromJsonUser($data)
    {

        $self = new Self();
        $self->validUser($data);
        
        if ($self->isvalid) {

            $montarUser = $self->montarUser($data);
            return $montarUser;
        } else {

            return $self;
        }
    }


    public function montarUser($data)
    {

        $this->setName($data['name']);
        $this->setSobre_nome($data['sobre_nome']);
        $this->setEmail($data['email']);
        $this->setPassword(Hash::make($data['password']));

       // 'password' => Hash::make($data['password']),
        $user = [];

        $user['name']           = $this->getName();
        $user['sobre_nome']     = $this->getSobre_nome();
        $user['email']          = $this->getEmail();
        $user['password']       = $this->getPassword();

        return $user;
    }



    public function validUser($data)
    {

        $array = [];

        $array['name']       = $this->_name($data);
        $array['sobre_nome'] = $this->_sobre_nome($data);
        $array['email']      = $this->_email($data);
        $array['password']   = $this->_password($data);

        $array = array_filter($array, function ($data) {
            return $data != null;
        });

        $user = !empty($array);

        if ($user) {

            $this->menssagem = $array;
            $this->isvalid   = false;
        } else {

            $this->menssagem = [];
            $this->isvalid   = true;
        }
    }



    /**
     * @param array $data
     * @return string|null
     */
    private function _name($data)
    {

        if (!isset($data['name'])) {
            return ErrosEnum::$required;
        }

        if (!is_string($data['name'])) {
            return ErrosEnum::$olnystrings;
        }

        return null;
    }

    /**
     * @param array $data
     * @return string|null
     */
    private function _sobre_nome($data)
    {

        if (!isset($data['sobre_nome'])) {
            return ErrosEnum::$required;
        }

        if (!is_string($data['sobre_nome'])) {
            return ErrosEnum::$olnystrings;
        }

        return null;
    }

    /**
     * @param array $data
     * @return string|null
     */
    private function _email($data)
    {

        if (!isset($data['email'])) {
            return ErrosEnum::$required;
        }

        if (!is_string($data['email'])) {
            return ErrosEnum::$olnystrings;
        }

        return null;
    }

    /**
     * @param array $data
     * @return string|null
     */
    private function _password($data)
    {

        if (!isset($data['password'])) {
            return ErrosEnum::$required;
        }

        if (!is_string($data['password'])) {
            return ErrosEnum::$olnystrings;
        }

        return null;
    }

}