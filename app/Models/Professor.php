<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{

    protected $fillable = ['id', 'idade_professor', 'formacao_professor', 'cpf_professor', 'instituicao_professor', 'diploma_professor', 'especializacao_professor', 'users_id', 'endereco_id', 'lstacontato_id'];

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
        return $this->hasMany(Aulas::class, 'professor_id');
    }



}
