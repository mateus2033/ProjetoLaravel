<?php

namespace App\Repository;

use App\Entidades\EntidadeEndereco\EntidadeEndereco;
use App\Interfaces\EnderecoInterface;
use App\Models\Enderecos;
use Exception;

class EnderecoRepository implements EnderecoInterface
{

    protected $fillable = ['id','endereco_rua','endereco_bairro','endereco_cidade','endereco_estado','endereco_cep','endereco_longradouro'];
    protected $modeloClasse = Endereco::class;

    public function validarEndereco($data)
    {
        
        $enderecoFromJson = EntidadeEndereco::fromJsonEndereco($data);
        if(!isset($enderecoFromJson->menssagem)){
            return $enderecoFromJson;
        } else { 

            $endereco = json_encode($enderecoFromJson->menssagem);
            throw new Exception($endereco, 406);
            
        }
    }

    public function criarEndereco(array $endereco)
    {   
        
        $validarEndereco = $this->validarEndereco($endereco);
        $createEndereco  = Enderecos::create($validarEndereco);
        return  $createEndereco;
    }


    public function updateEndereco($endereco, $aluno_id)
    {
        
        $hasendereco = Enderecos::find($aluno_id);
        $endereco    = $this->validarEndereco($endereco);
        $hasendereco->update($endereco);
        return $hasendereco;

    }
    
    public function deleteEndereco($endereco)
    {
        
        if(!$endereco) throw new Exception("Error, o Endereco não informado." ,404);
        else
        $deletendereco = Enderecos::destroy($endereco->id);
        return true;

    }



}