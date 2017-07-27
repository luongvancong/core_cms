<?php

return [
    'title' => 'Menu',
    'active' => 1,
    'url' => '/admin/menu',
    'icon' => 'fa fa-leaf',
    'pattern_active' => 'admin/menu*',
    'order' => 10000,
    'permission' => ['menu.view'],
    'role' => [],
    'items' => [
        [
            'title' => 'Danh sách',
            'active' => 1,
            'url' => '/admin/menu',
            'pattern_active' => 'admin/menu'
        ],
        [
            'title' => 'Thiết kế',
            'active' => 1,
            'url' => '/admin/menu/design',
            'pattern_active' => 'admin/menu/design'
        ]
    ]
];