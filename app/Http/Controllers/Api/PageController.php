<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Post;
use App\Comment;
use App\Category;
use App\PublicUser;
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

    public function update(Request $request){
        $data = $request->all();



        // controllo la validità dei dati
        $validator = Validator::make($data,
                [
                    'full_name' => 'required|max:100',
                    'email' => 'required|email|max:150',
                    'comment' => 'required |min:30',
                ],
                [
                    'full_name.required' => 'Il nome è bbligatorio',
                    'full_name.max' => 'Il nome può avere al massiamo :max caratteri',
                    'email.required' => 'L\'indirizzo email è obbligatorio',
                    'email.max' => 'L\'indirizzo email può avere al massiamo :max caratteri',
                    'email.email' => 'L\'indirizzo email non è un indirizzo valido',
                    'comment.required' => 'Il commento è bbligatorio',
                ]
            );


        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        //assegnazione e salvataggio dati nel db
        $new_public_user = new PublicUser();
        $new_public_user->name = $data['user']['name'];
        $new_public_user->surname = $data['user']['surname'];
        $new_public_user->email = $data['user']['email'];
        // $new_public_user->fill($data['user']);
        $new_public_user->save();

        $new_User_id = PublicUser::where('email', $data['user']['email'])->first()->id;

        $new_comment = new Comment();
        $new_comment->title = $data['comment']['title'];
        $new_comment->slug = Comment::slugGenerator($new_comment->title);
        $new_comment->content = $data['comment']['content'];
        $new_comment->public_user_id = $new_User_id;
        $new_comment->post_id = $data['comment']['post_id'];
        $new_comment->save();

        // dump($new_User_id);
        return response()->json($data);

    }

}
