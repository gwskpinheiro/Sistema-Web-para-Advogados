<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aluno;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
        'titulo',
    ];

    public function alunos(){
        return $this->belongsToMany(Aluno::class)->withTimestamps();
    }
}

