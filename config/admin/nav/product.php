<?php

return [
    'title' => 'Product',
    'active' => 1,
    'url' => '/admin/product',
    'icon' => 'fa fa-product-hunt',
    'pattern_active' => 'admin/product*',
    'order' => 10000,
    'permission' => ['product.view'],
    'role' => [],

    'items' => [
        [
            'title' => 'Product',
            'active' => 1,
            'url' => '/admin/product',
            'pattern_active' => 'admin/product*'
        ],
        [
            'title' => 'Category',
            'active' => 1,
            'url' => '/admin/product-category/index',
            'pattern_active' => 'admin/product-category*'
        ]
    ]
];