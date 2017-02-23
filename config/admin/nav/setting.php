<?php

return [
    'title' => 'Cấu hình',
    'icon' => 'fa fa-cog',
    'pattern_active' => 'admin/settings*', // Biểu thức xác định trạng thái menu sidebar active
    'permission' => ['config.view'],
    'active' => 1,
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
];