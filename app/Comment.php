<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{

    protected $fillable =[
        'title',
        'slug',
        'content',
        'post_id',
        'public_user_id'
    ];

    public function post(){
        return $this->belongsTo('App\Post');
    }

    public function publicUser(){
        return $this->belongsTo('App\PublicUser');
    }

    public static function slugGenerator($title){

        $slug = Str::slug($title, '-');
        $slug_new_comment = $slug;
        $counter = 1;
        $same_title = Comment::where('slug', $slug)->first();
        while($same_title){
            $slug = $slug_new_comment.'-'.$counter;
            $same_title = Comment::where('slug', $slug)->first();
            $counter ++;
        }
        return $slug;
    }
}
