<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicUser extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'email'
    ];

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
