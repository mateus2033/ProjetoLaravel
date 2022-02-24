<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aulas extends Model
{

    protected $fillable = ['id','aula_data','duracao_aula','nome_aula','nivel_aula','descricao_aula', 'confirmacao_professor','confirmacao_aluno','professor_id','aluno_id'];

    use HasFactory;

    public function calendar()
    {
        return $this->hasMany(Calendar::class,  'aula_id');
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
    
    
}
