<?php

Route::group(['prefix' => 'admin/resource', 'middleware' => ['web', 'admin', 'acl'], 'namespace' => 'Modules\Resource\Http\Controllers\Admin'], function() {
    Route::get('/', ['as' => 'admin.resource.index', 'permissions' => 'resource.view', 'uses' => 'ResourceController@getIndex']);

    // Create
    Route::get('/create', ['as' => 'admin.resource.create', 'permissions' => 'resource.create', 'uses' => 'ResourceController@getCreate']);
    Route::post('/create', ['permissions' => 'resource.create', 'uses' => 'ResourceController@postCreate']);

    // edit
    Route::get('/{id}/edit', ['as' => 'admin.resource.edit', 'permissions' => 'resource.edit', 'uses' => 'ResourceController@getEdit']);
    Route::post('/{id}/edit', ['permissions' => 'resource.edit', 'uses' => 'ResourceController@postEdit']);

    // delete
    Route::get('/{id}/delete', ['as' => 'admin.resource.delete', 'permissions' => 'resource.delete', 'uses' => 'ResourceController@getDelete']);
});