<?php

return [
    [
        'title' => 'Cấu hình',
        'icon' => 'fa fa-cog',
        'pattern_active' => 'admin/settings*', // Biểu thức xác định trạng thái menu sidebar active
        'permission' => ['config.view'],
        'items' => [
            [
                'title' => 'Thông tin website',
                'url' => '/admin/settings/website',
                'pattern_active' => 'admin/settings/website'

            ],
            [
                'title' => 'Metadata',
                'url' => '/admin/settings/metadata',
                'pattern_active' => 'admin/settings/metadata'
            ],
            [
                'title' => 'Mạng xã hội',
                'url' => '/admin/settings/social',
                'pattern_active' => 'admin/settings/social'
            ]
        ]
    ],

    // [
    //     'title' => 'Category',
    //     'url' => '/admin/categories',
    //     'icon' => 'fa fa-folder',
    //     'pattern_active' => 'admin/categories/*',
    //     'permission' => ['category.view'],
    //     'role' => []
    // ],

    [
        'title' => 'Banner',
        'url' => '/admin/banners',
        'icon' => 'fa fa-file-image-o',
        'pattern_active' => 'admin/banners',
        'permission' => ['banner.view'],
        'role' => []
    ],

    [
        'title' => 'Tin tức',
        'url' => '/admin/post/index',
        'pattern_active' => 'admin/post*',
        'icon' => 'fa fa-newspaper-o',
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
    ],

    [
        'title' => 'Trang tĩnh',
        'url' => '/admin/page',
        'pattern_active' => 'admin/page*',
        'icon' => 'fa fa-newspaper-o',
        'permission' => ['page.view']
    ],

    [
        'title' => 'Tài nguyên',
        'url' => '/admin/resource',
        'pattern_active' => 'admin/resource*',
        'icon' => 'fa fa-database',
        'permission' => ['resource.view']
    ]
];