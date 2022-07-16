<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::namespace('Api')
    ->prefix('posts')
    ->group(function(){

        Route::get('/', 'PageController@index');
        Route::get('/get-data', 'PageController@getCategoryAndTags');
        Route::get('/by-type/{slug}/{type}', 'PageController@getSelectedTypePosts');
        // Route::get('/by-cat/{slug}', 'PageController@getPostsByCategory');
        // Route::get('/by-tag/{slug}', 'PageController@getPostsByTag');
        Route::get('/{slug}', 'PageController@show');
    });
