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

        Route::get('/{id}/toggleBanner', ['as' => 'admin.product.is_banner', 'permissions' => 'product.edit' ,'uses' => 'ProductController@toggleBanner']);

        // Editable
        Route::post('/ajax/editable', ['as' => 'admin.product.editable', 'permissions' => 'product.edit' ,'uses' => 'ProductController@ajaxEditable']);

        // Change avatar
        Route::post('/changeAvatar', ['as' => 'admin.product.changeAvatar', 'permissions' => 'product.edit' ,'uses' => 'ProductController@changeAvatar']);

        // Tags autocomplete
        Route::get('autocomplete', ['as' => 'admin.product.tagAutoComplete', 'permissions' => 'product.edit' ,'uses' => 'ProductController@autocomplete']);

        Route::get('/{productId}/tags', ['as' => 'admin.product.tag.index', 'permissions' => 'product.edit' ,'uses' => 'ProductController@tagIndex']);
        Route::get('/{productId}/tags/{tagId}/delete', ['as' => 'admin.product.tag.delete', 'permissions' => 'product.edit' ,'uses' => 'ProductController@tagDelete']);

        Route::get('/{productId}/tags/create', ['as' => 'admin.product.tag.create', 'permissions' => 'product.edit' ,'uses' => 'ProductController@tagCreate']);
        Route::post('/{productId}/tags/create', ['permissions' => 'product.edit', 'uses' => 'ProductController@tagCreateStore']);

        // Quick edit từ khóa
        Route::post('/ajax-change-all-keyword', ['as' => 'admin.product.ajax.editAllKeyword', 'uses' => 'ProductController@ajaxQuickEditAllKeyword']);

        // Quick delete items
        Route::post('/ajax/quick-delete-multiple', ['as' => 'admin.products.deleteMulti', 'uses' => 'ProductController@ajaxQuickDeleteMultiple']);

        // Ảnh sản phẩm
        Route::group(['prefix' => '{productId}/images'], function() {
            Route::get('/', ['as' => 'admin.product.images', 'uses' => 'ProductController@images']);
            Route::get('/create', ['as' => 'admin.product.images.create', 'uses' => 'ProductController@createImage']);
            Route::post('/create', 'ProductController@storeImage');
            Route::get('/{id}/destroy', ['as' => 'admin.product.images.destroy', 'uses' => 'ProductController@destroyImage']);

            // Ajax editable
            Route::post('/ajax/editable', ['as' => 'admin.product.images.editable', 'uses' => 'ProductController@imagesAjaxEditAble']);

            // Quick delete items
            Route::post('/ajax/quick-delete-multiple', ['as' => 'admin.products.images.deleteMulti', 'uses' => 'ProductController@ajaxImageQuickDeleteMultiple']);
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