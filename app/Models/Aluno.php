<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{

    protected $fillable = ['id', 'idade_aluno', 'cpf_aluno', 'escolaridade_aluno', 'curiosidades_aluno','objetivos_aluno', 'endereco_id', 'lstacontato_id', 'users_id'];

    use HasFactory;
    

    public function endereco()
    {
        return $this->belongsTo(Enderecos::class, 'endereco_id');
    }


    public function contato()
    {
        return $this->belongsTo(ListaContatos::class, 'lstacontato_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function aulas()
    {
        return $this->hasMany(Aulas::class,'aluno_id', 'id');
    }





}
