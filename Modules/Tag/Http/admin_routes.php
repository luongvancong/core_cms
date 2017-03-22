<?php

Route::group(['prefix' => 'admin/tag', 'middleware' => ['web', 'admin', 'acl'], 'namespace' => 'Modules\Tag\Http\Controllers\Admin'], function() {

    Route::get('/', ['as' => 'admin.tag.index', 'uses' => 'TagController@getIndex']);

    Route::get('/create', ['as' => 'admin.tag.create', 'permissions' => 'tag.create', 'uses' => 'TagController@getCreate']);
    Route::post('/create', 'TagController@postCreate');

    Route::get('/{id}/edit', ['as' => 'admin.tag.edit', 'permissions' => 'tag.edit', 'uses' => 'TagController@getEdit']);
    Route::post('/{id}/edit', 'TagController@postEdit');

    Route::get('/{id}/delete', ['as' => 'admin.tag.delete', 'permissions' => 'tag.delete', 'uses' => 'TagController@getDelete']);
});