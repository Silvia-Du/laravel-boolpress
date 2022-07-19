<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Comment;

class UpadateCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = Comment::all();
        foreach($comments as $comment){
            $id_post_rand = Post::inRandomOrder()->first()->id;
            $comment->post_id = $id_post_rand;
            $comment->update();
        }
    }
}
