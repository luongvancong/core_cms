<?php
Route::group(['middleware' => ['web', 'admin', 'acl']], function() {

    Route::group(['prefix' => 'admin/product', 'namespace' => 'Modules\Product\Http\Controllers\Admin'], function() {
        Route::get('/', [
            'as'          => 'admin.product.index',
            'uses'        => 'ProductController@index',
            'permissions' => 'product.view'
        ]);

        Route::get('/create',  [
            'as'          => 'admin.product.create',
            'uses'        => 'ProductController@create',
            'permissions' => 'product.create'
        ]);

        Route::post('/create', [
            'as'          => 'admin.product.store',
            'uses'        =>'ProductController@store',
            'permissions' => 'product.create'
        ]);

        Route::get('{id}/edit',  [
            'as'          => 'admin.product.edit',
            'uses'        => 'ProductController@edit',
            'permissions' => 'product.edit'
        ]);

        Route::post('{id}/edit', [
            'as'          => 'admin.product.update',
            'uses'        => 'ProductController@update',
            'permissions' => 'product.edit'
        ]);

        Route::get('{id}/delete', [
            'as'          => 'admin.product.destroy',
            'uses'        => 'ProductController@destroy',
            'permissions' => 'product.delete'
        ]);

        Route::get("/{id}/toggleActive", ['as' => 'admin.product.toggleActive', 'permissions' => 'product.edit', 'uses' => 'ProductController@toggleActive']);

        // Tích chọn sp hot nhất
        Route::get('/{id}/toggleHot', ['as' => 'admin.product.hot', 'permissions' => 'product.edit' ,'uses' => 'ProductController@toggleHot']);

        // Tích chọn sp mới nhất
        Route::get('/{id}/toggleNewest', ['as' => 'admin.product.newest', 'permissions' => 'product.edit' ,'uses' => 'ProductController@toggleNewest']);

        // Editable
        Route::post('/ajax/editable', ['as' => 'admin.product.ajax.editable', 'permissions' => 'product.edit' ,'uses' => 'ProductController@ajaxEditable']);

        // Quick delete items
        Route::post('/ajax/quick-delete-multiple', ['as' => 'admin.products.deleteMulti', 'uses' => 'ProductController@ajaxQuickDeleteMultiple']);

        // Ảnh sản phẩm
        Route::group(['prefix' => '{productId}/images'], function() {
            Route::get('/', ['as' => 'admin.product.images', 'uses' => 'ProductImageController@index']);
            Route::get('/create', ['as' => 'admin.product.images.create', 'uses' => 'ProductImageController@create']);
            Route::post('/create', 'ProductImageController@store');
            Route::get('/{id}/destroy', ['as' => 'admin.product.images.destroy', 'uses' => 'ProductImageController@destroy']);

            // Ajax editable
            Route::post('/ajax/editable', ['as' => 'admin.product.images.editable', 'uses' => 'ProductImageController@ajaxEditAble']);

            // Quick delete items
            Route::post('/ajax/quick-delete-multiple', ['as' => 'admin.products.images.deleteMulti', 'uses' => 'ProductImageController@ajaxImageQuickDeleteMultiple']);
        });
    });


    // Product category
    Route::group(['prefix' => 'admin/product-category', 'middleware' => ['web', 'admin', 'acl'], 'namespace' => 'Modules\Product\Http\Controllers\Admin'], function() {
        Route::get('/index', ['as' => 'admin.product_category.index', 'permissions' => 'product_category.view' ,'uses' => 'CategoryController@getIndex']);
        Route::get('/create', ['as' => 'admin.product_category.create', 'permissions' => 'product_category.view' ,'uses' => 'CategoryController@getCreate']);
        Route::post('/create', ['permissions' => 'product_category.create', 'uses' => 'CategoryController@postCreate']);

        Route::get('/{id}/edit', ['as' => 'admin.product_category.edit', 'permissions' => 'product_category.view' ,'uses' => 'CategoryController@getEdit']);
        Route::post('/{id}/edit', ['permissions' => 'product_category.edit', 'uses' => 'CategoryController@postEdit']);

        Route::get('/{id}/delete', ['as' => 'admin.product_category.delete', 'permissions' => 'product_category.delete' ,'uses' => 'CategoryController@getDelete']);

        Route::get('/optimize', ['as' => 'admin.product_category.optimize', 'permissions' => 'product_category.edit', 'uses' => 'CategoryController@getOptimize']);
    });
});