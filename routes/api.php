<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::namespace('Api')
    ->prefix('posts')
    ->group(function(){

        Route::get('/', 'PageController@index');
        Route::get('/get-data', 'PageController@getCategoryAndTags');
        Route::get('/post-by-cat/{slug}', 'PageController@getPostByCategory');
        Route::get('/post-by-tag/{slug}', 'PageController@getPostsByTag');
        Route::get('/{slug}', 'PageController@show');
    });
