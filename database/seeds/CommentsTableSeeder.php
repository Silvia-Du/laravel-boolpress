<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Post;
use App\PublicUser;
use Faker\Generator as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i < 100; $i ++){
            $new_comment = new Comment();
            $new_comment->title = $faker->sentence(4);
            $new_comment->slug = Comment::slugGenerator($new_comment->title);
            $new_comment->content = $faker->text(300);

            $id_post_rand = Post::inRandomOrder()->first()->id;
            $new_comment->post_id = $id_post_rand;



            $new_comment->save();

        }
    }
}
