<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Comment extends Model
{

    protected $table = 'comments';
    protected $fillable = ['content'];


    public function post(){
        return $this->belongsTo(Post::class);
    }
}
