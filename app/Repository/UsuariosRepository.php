<?php

namespace App\Repository;

use App\Entidades\EntidadeUsuario\EntidadeUsuario;
use App\ExceptionsErros\MyExceptionsErros;
use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
class UsuariosRepository  implements UserInterface
{

    protected $modeloClass = User::class;

    /**
     * @param array $data
     * @return object|Exception
     *  
     * */ 
    public function registrarUsuario(array $data)
    {
     
        $user        = $this->fromJsonUser($data);
        $email       = $this->validaEmail($data['email']);
        $getEmail    = $this->getEmailFromCreate($email);
        $usuario     = User::create($user);
        return $usuario;

    }


    public function validaEmail($email)
    {
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

            return $email;

        } else {

            throw new Exception("Email invalido.");
        }

    }


    public function fromJsonUser($data)
    {   
        $fromJson = EntidadeUsuario::fromJsonUser($data);
        if(isset($fromJson->menssagem))
        {
            $user = json_encode($fromJson->menssagem);
            throw new Exception($user, 406);

        } else { 

            return $fromJson;

        }
        
    }


    /**
     * @param string $email
     * @return Exception|bool
    */
    public function getEmailFromCreate(string $email)
    {
        
        $user = $this->modeloClass::where('email','=',$email)->first();
        if($user)
        {
            throw new Exception("E-mail já cadastrado.",406);
        }

        return true;

    }


    public function deleteUser($user_id)
    {

       $user   = User::find($user_id);
       $delete = User::destroy($user->id);
       return true;

    }


}