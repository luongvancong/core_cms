<?php

Route::group(['middleware' => ['web', 'admin', 'acl'], 'prefix' => 'admin/menu', 'namespace' => 'Modules\Menu\Http\Controllers\Admin'], function()
{
    Route::get('', ['as' => 'admin.menu.index', 'uses' => 'MenuController@getIndex']);

    Route::get('/create', ['as' => 'admin.menu.create', 'uses' => 'MenuController@getCreate']);
    Route::post('/create', 'MenuController@postCreate');

    Route::get('/{id}/edit', ['as' => 'admin.menu.edit', 'uses' => 'MenuController@getEdit']);
    Route::post('/{id}/edit', 'MenuController@postEdit');

    Route::get('/{id}/delete', ['as' => 'admin.menu.delete', 'uses' => 'MenuController@getDelete']);

    Route::get('/{id}/active', ['as' => 'admin.menu.active', 'uses' => 'MenuController@getActive']);

    Route::get('/ajax/search-post', ['as' => 'admin.menu.ajax.searchPost', 'uses' => 'MenuController@ajaxSearchPost']);
});
