<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        $categories = Category::all();
        return view('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();
        $new_post = new Post();

        $data['slug'] = Post::slugGenerator($data['title']);
        $new_post->fill($data);
        $new_post->save();
        if(array_key_exists('tags', $data)){
            $new_post->tags()->attach($data['tags']);
        }

        return redirect()->route('admin.posts.show', $new_post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if($post){
            return view('admin.posts.show', compact('post'));
        }
        abort(404, 'Post non trovato nell\'elenco');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        $tags = Tag::all();
        if($post){
            return view('admin.posts.edit', compact('post', 'categories', 'tags'));
        }
        abort(404, 'Post non trovato nell\'elenco');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->all();
        //se il titolo è diverso, rigenero lo slug
        if($data['title'] != $post->title){
            $data['slug'] = Post::slugGenerator($data['title']);
        }
        $post->update($data);

        if(array_key_exists('tags', $data)){
            $post->tags()->sync($data['tags']);
        }else{
            $post->tags()->detach();
        }
        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('prodotto cancellato', "Il post $post->title è stato cancellato corretamente");

    }
}
