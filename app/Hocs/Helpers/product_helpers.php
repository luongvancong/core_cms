<?php

if ( ! function_exists('productRepository') ) {
    function productRepository() {
        return App::make('Nht\Hocs\Products\ProductRepository');
    }
}

if( ! function_exists('product_get_type_options') ) {
    function product_get_type_options() {
        return [
            Nht\Hocs\Products\Product::NORMAL   => 'Sản phẩm lẻ',
            Nht\Hocs\Products\Product::DESIGN   => 'Sản phẩm thiết kế',
            Nht\Hocs\Products\Product::ADVISORY => 'Sản phẩm tư vấn thiết kế'
        ];
    }
}