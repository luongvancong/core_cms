<?php

return [
    'title' => 'Tin tức',
    'active' => 1,
    'url' => '/admin/post/index',
    'pattern_active' => 'admin/post*',
    'icon' => 'fa fa-newspaper-o',
    'order' => 10000,
    'permission' => ['post.view'],
    'items' => [
        [
            'title' => 'Tin tức',
            'url' => '/admin/post/index',
            'pattern_active' => 'admin/post/*'
        ],
        [
            'title' => 'Danh mục',
            'url' => '/admin/post-category/index',
            'pattern_active' => 'admin/post-category*'
        ]
    ]
];