<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'cpf_cnpj',
        'email',
        'telefone',
        'endereco',
    ];

    public function casos(): HasMany
    {
        return $this->hasMany(Caso::class);
    }

    public function processos(): HasMany
    {
        return $this->hasMany(Processo::class);
    }
}
