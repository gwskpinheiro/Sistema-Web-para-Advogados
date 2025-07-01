<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Atividade extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'titulo',
        'descricao',
        'data_hora',
        'user_id',       // destinatário
        'autor_id',      // quem criou
        'caso_id',
        'processo_id',
        'tipo',
        'status',
    ];

    protected $casts = [
        'data_hora' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function autor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'autor_id');
    }

    public function caso(): BelongsTo
    {
        return $this->belongsTo(Caso::class);
    }

    public function processo(): BelongsTo
    {
        return $this->belongsTo(Processo::class);
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }
}
