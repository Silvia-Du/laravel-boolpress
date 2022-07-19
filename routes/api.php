<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::namespace('Api')
    ->prefix('posts')
    ->group(function(){

        Route::get('/', 'PageController@index');
        Route::get('/get-data', 'PageController@getCategoryAndTags');
        Route::get('/by-type/{slug}/{type}', 'PageController@getSelectedTypePosts');
        Route::get('/{slug}', 'PageController@show');
    });
