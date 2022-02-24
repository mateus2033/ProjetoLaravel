<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaContatos extends Model
{

    protected $fillable = ['id', 'celular_primario', 'celular_secundario', 'telefone_primario', 'telefone_secundario', 'linkedin'];

    use HasFactory;
    
}
