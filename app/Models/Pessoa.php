<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Perfil;

class Pessoa extends Model
{
    protected $table = 'pessoas';
    protected $fillable = ['nome', 'idade'];

    public function perfil(){
        return $this->hasOne(Perfil::class);
    }
}
