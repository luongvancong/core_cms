<?php

Route::group(['middleware' => 'web', 'prefix' => 'product', 'namespace' => 'Modules\Product\Http\Controllers\Frontend\Product'], function()
{
    // Chi tiết sản phẩm
    Route::get('/{id}/{slug}', 'ProductController@getDetail');
});


Route::group(['middleware' => 'web', 'prefix' => 'product-category', 'namespace' => 'Modules\Product\Http\Controllers\Frontend\Category'], function()
{
    // Chi tiết danh mục
    Route::get('/{id}/{slug}', 'CategoryController@getDetail');
});