<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Post;

class UpdatePostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();

        foreach($posts as $post){
            $id_cat_random = Category::inRandomOrder()->first()
            ->id;
            $post->category_id = $id_cat_random;
            $post->update();
        }
    }
}
