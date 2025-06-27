<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evento extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'titulo',
        'descricao',
        'data_hora',
        'user_id',
        'caso_id',
        'processo_id',
    ];

    protected $casts = [
        'data_hora' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function caso(): BelongsTo
    {
        return $this->belongsTo(Caso::class);
    }

    public function processo(): BelongsTo
    {
        return $this->belongsTo(Processo::class);
    }
}
