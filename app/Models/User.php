<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'nome',
        'email',
        'password',
        'telefone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Atividades atribuídas a este advogado
    public function atividades(): HasMany
    {
        return $this->hasMany(Atividade::class);
    }

   
    public function atividadesCriadas(): HasMany
    {
        return $this->hasMany(Atividade::class, 'autor_id');
    }

    
    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }
}
