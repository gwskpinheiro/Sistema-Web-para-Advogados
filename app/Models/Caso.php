<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Caso extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'titulo',
        'descricao',
        'cliente_id',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function eventos(): HasMany
    {
        return $this->hasMany(Evento::class);
    }

    public function atividades(): HasMany
    {
        return $this->hasMany(Atividade::class);
    }
}
