<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;

class PostComments extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = Post::create([
            'title' => 'Meu primeiro post',
        ])->comments()->create([
            'content' => 'Esse é o primeiro comentário do post',
        ]);


        // $post->comments()->create([
        //     'content' => 'Esse é o segundo comentário do post',
        // ]);
    }
}
