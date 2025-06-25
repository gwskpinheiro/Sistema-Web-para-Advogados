<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nivel extends Model
{
    use SoftDeletes;

    protected $table = 'niveis';
    protected $fillable = ['nome'];
}
