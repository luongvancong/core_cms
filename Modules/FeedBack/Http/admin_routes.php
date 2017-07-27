<?php

Route::group(['prefix' => 'admin/feedback', 'middleware' => ['web', 'admin', 'acl'], 'namespace' => 'Modules\FeedBack\Http\Controllers\Admin'], function() {

    Route::get('/index', ['as' => 'admin.feedback.index', 'permissions' => 'feedback.view', 'uses' => 'FeedBackController@getIndex']);

    Route::get('/create', ['as' => 'admin.feedback.create', 'permissions' => 'feedback.create', 'uses' => 'FeedBackController@getCreate']);
    Route::post('/create', 'FeedBackController@postCreate');

    Route::get('/{id}/edit', ['as' => 'admin.feedback.edit', 'permissions' => 'feedback.edit', 'uses' => 'FeedBackController@getEdit']);
    Route::post('/{id}/edit', 'FeedBackController@postEdit');

    Route::get('/{id}/delete', ['as' => 'admin.feedback.delete', 'permissions' => 'feedback.delete', 'uses' => 'FeedBackController@getDelete']);
});