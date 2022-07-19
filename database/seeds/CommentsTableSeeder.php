<?php

use Illuminate\Database\Seeder;
use App\Comment;
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
            $new_comment->description = $faker->text(300);
            $new_comment->save();

        }
    }
}
