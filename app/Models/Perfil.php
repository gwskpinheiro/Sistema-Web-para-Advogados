<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table =  'perfils';
    protected $fillable = [
        'bio',
        'pessoa_id',
    ];

    // Perfil::create([
    //     'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
    //     'pessoa_id' => 1,
    // ]);
    public function pessoa(){
        return $this->belongsTo(Pessoa::class);
    }

}
