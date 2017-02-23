<?php

return [
    'title' => 'User',
    'url' => '/admin/users',
    'icon' => 'fa fa-users',
    'pattern_active' => 'admin/users*',
    'permission' => ['user.view'],
    'active' => 1,
    'order' => 10000,
    'role' => [],
    'items' => [
        [
            'title' => 'Users',
            'url' => '/admin/users',
            'pattern_active' => 'admin/users'

        ],
        [
            'title' => 'Role',
            'url' => '/admin/users/roles',
            'pattern_active' => 'admin/users/roles*'
        ],
        [
            'title' => 'Permission',
            'url' => '/admin/users/permissions',
            'pattern_active' => 'admin/users/permissions*'
        ]
    ]
];