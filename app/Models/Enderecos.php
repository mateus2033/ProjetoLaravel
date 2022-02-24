<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    
    protected $fillable = ['id', 'endereco_rua', 'endereco_bairro', 'endereco_cidade', 'endereco_estado', 'endereco_cep', 'endereco_longradouro'];

    use HasFactory;
}
