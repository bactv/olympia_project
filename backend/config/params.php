<?php
return [
    'adminEmail' => 'admin@example.com',
    'rememberMe_time' => 3600 * 24 * 30,
    'img_url' => [
        'data_path' => '/storage/img/',
        'admin_avatar' => [
            'source' => 'admin_avatar',
            'width' => '',
            'height' => ''
        ]
    ],
    'controller_except' => ['Default'],
    'question_level' => [
        'easy' => 0.5,
        'medium' => 0.3,
        'hard' => 0.2
    ],
    'question_type' => [
        'reply' => 1,
        'multiple_choice' => 2
    ]
];
