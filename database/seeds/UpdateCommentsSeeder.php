<?php

use Illuminate\Database\Seeder;
use App\PublicUser;
use App\Comment;

class UpdateCommentsSeeder extends Seeder
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
            $id_public_user = PublicUser::inRandomOrder()->first()->id;
            $comment->public_user_id = $id_public_user;
            $comment->update();
        }

    }
}
