<?php

Route::group(['prefix' => '/post', 'middle_ware' => ['web']], function() {
    Route::get('/', ['uses' => 'Modules\Post\Http\Controllers\Frontend\PostController@getIndex']);
    Route::get('/{id}-{slug}', 'Modules\Post\Http\Controllers\Frontend\PostDetailController@getDetail');
});