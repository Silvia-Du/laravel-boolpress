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
        $posts = Post::with('category')->with('tags')->paginate(4);

        return response()->json($posts);
    }

    public function show($slug){

        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();

        return response()->json($post);
    }

    public function getSelectedTypePosts($slug, $type){
        if($type =='cat'){
            $category = Category::where('slug', $slug)->with('posts')->first();
            return response()->json(compact('category'));
        }
        if($type == 'tag'){
            $tag = Tag::where('slug', $slug)->with('posts')->first();
            return response()->json(compact('tag'));
        }




    }


    public function getCategoryAndTags(){
        $categories= Category::all();
        $tags = Tag::all();

        return response()->json(compact('categories', 'tags'));
    }

}
