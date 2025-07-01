<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model
{
    protected $fillable = [
        'mensagem',
        'user_id',
        'atividade_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function atividade(): BelongsTo
    {
        return $this->belongsTo(Atividade::class);
    }
}
