<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PageController extends Controller
{
    public function index(){
        $posts = Post::with('category')->with('tags')->paginate(4);

        return response()->json($posts);
    }
}
