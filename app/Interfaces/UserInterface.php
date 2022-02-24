<?php
namespace App\Interfaces;

interface UserInterface
{

    public function registrarUsuario(array $data);
    public function fromJsonUser($data);
    public function getEmailFromCreate(string $email);
    public function deleteUser($user_id);

}