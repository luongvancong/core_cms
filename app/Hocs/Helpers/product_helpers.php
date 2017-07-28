<?php

if ( ! function_exists('productRepository') ) {
    function productRepository() {
        return App::make('App\Hocs\Products\ProductRepository');
    }
}

if( ! function_exists('product_get_type_options') ) {
    function product_get_type_options() {
        return [
            App\Hocs\Products\Product::NORMAL   => 'Sản phẩm lẻ',
            App\Hocs\Products\Product::DESIGN   => 'Sản phẩm thiết kế',
            App\Hocs\Products\Product::ADVISORY => 'Sản phẩm tư vấn thiết kế'
        ];
    }
}