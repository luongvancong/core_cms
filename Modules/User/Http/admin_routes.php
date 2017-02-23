<?php

/**
 * Users module
 */
Route::group(['prefix' => 'admin/users', 'middleware' => ['web', 'admin', 'acl'], 'namespace' => 'Modules\User\Http\Controllers\Admin'], function() {
    Route::get('/', [
        'as' => 'user.index',
        'uses' => 'UserController@index',
        'permissions' => 'user.view',
    ]);

    Route::get('create', [
        'as' => 'user.create',
        'uses' => 'UserController@create',
        'permissions' => 'user.create',
    ]);

    Route::post('/', [
        'as' => 'user.store',
        'uses' => 'UserController@store',
        'permissions' => 'user.store',
    ]);

    Route::get('{users}/edit', [
        'as' => 'user.edit',
        'uses' => 'UserController@edit',
        'permissions' => 'user.edit',
    ]);

    Route::post('{user}/edit', [
        'as' => 'user.update',
        'uses' => 'UserController@update',
        'permissions' => 'user.update',
    ]);

    Route::get('{user}/delete', [
        'as' => 'user.destroy',
        'uses' => 'UserController@destroy',
        'permissions' => 'user.destroy',
    ]);
});

/**
 * Roles module
 */
Route::group(['prefix' => 'admin/users/roles', 'middleware' => ['web', 'admin', 'acl'], 'namespace' => 'Modules\User\Http\Controllers\Admin'], function() {
    Route::get('/', [
        'as'          => 'role.index',
        'uses'        => 'RoleController@index',
        'permissions' => 'role.view',
    ]);

    Route::get('create', [
        'as'          => 'role.create',
        'uses'        => 'RoleController@create',
        'permissions' => 'role.create',
    ]);

    Route::post('/create', [
        'as'          => 'role.store',
        'uses'        => 'RoleController@store',
        'permissions' => 'role.store',
    ]);

    Route::get('{role}/edit', [
        'as'          => 'role.edit',
        'uses'        => 'RoleController@edit',
        'permissions' => 'role.edit',
    ]);

    Route::post('{role}/edit', [
        'as'          => 'role.update',
        'uses'        => 'RoleController@update',
        'permissions' => 'role.update',
    ]);

    Route::get('{role}/delete', [
        'as'          => 'role.destroy',
        'uses'        => 'RoleController@destroy',
        'permissions' => 'role.destroy',
    ]);
});

/**
 * Permissions module
 */
Route::group(['prefix' => 'admin/users/permissions', 'middleware' => ['web', 'admin', 'acl'], 'namespace' => 'Modules\User\Http\Controllers\Admin'], function() {
    Route::get('/', [
     'as'          => 'permission.index',
     'uses'        => 'PermissionController@index',
     'permissions' => 'permission.view',
    ]);

    Route::get('create', [
        'as'          => 'permission.create',
        'uses'        => 'PermissionController@create',
        'permissions' => 'permission.create',
    ]);

    Route::post('/create', [
        'as'          => 'permission.store',
        'uses'        => 'PermissionController@store',
        'permissions' => 'permission.store',
    ]);

    Route::get('{permission}/edit', [
        'as'          => 'permission.edit',
        'uses'        => 'PermissionController@edit',
        'permissions' => 'permission.edit',
    ]);

    Route::post('{permission}/edit', [
        'as'          => 'permission.update',
        'uses'        => 'PermissionController@update',
        'permissions' => 'permission.update',
    ]);

    Route::get('{permission}/delete', [
        'as'          => 'permission.destroy',
        'uses'        => 'PermissionController@destroy',
        'permissions' => 'permission.destroy',
    ]);
});