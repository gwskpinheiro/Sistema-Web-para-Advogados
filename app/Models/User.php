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

    public function eventos(): HasMany
    {
        return $this->hasMany(Evento::class);
    }

    public function atividades(): HasMany
    {
        return $this->hasMany(Atividade::class);
    }
}
