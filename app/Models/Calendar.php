<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{

    protected $fillable = ['class_date','duration','aula_id'];

    use HasFactory;


    public function Aulas()
    {
        return $this->belongsTo(Aulas::class,'id');
    }



}
