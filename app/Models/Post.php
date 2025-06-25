<?php

namespace App\Models;

use App\Models\Comment;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title'];



    function comments(){
        return $this->hasMany(Comment::class);
    }
}
