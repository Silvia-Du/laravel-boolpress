<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class PageController extends Controller
{
    public function index(){
        $posts = Post::with('category')->with('tags')->paginate(3);

        return response()->json($posts);
    }

    public function show($slug){

        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();

        return response()->json($post);
    }

    public function getPostsByCategoy($slug){
        $category = Category::where('slug', $slug)->with('posts')->first();

        return response()->json($category);

    }
    public function getPostsByTag($slug){
        $tag = Tag::where('slug', $slug)->with('posts')->first();

        return response()->json($tag);

    }

    public function getCategoryAndTags(){
        $categories= Category::all();
        $tags = Tag::all();

        return response()->json(compact('categories', 'tags'));
    }

}
