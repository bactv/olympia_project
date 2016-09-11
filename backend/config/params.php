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
    ],
    'type_game' => [
        1 => 'game_week',
        2 => 'game_month',
        3 => 'game_quarters',
        4 => 'game_year'
    ],
    'package_finish' => [
        1 => '40_mark',
        2 => '60_mark',
        3 => '80_mark'
    ],
    'question_probability' => [
        'game_week' => [
            'easy' => 0.5,
            'medium' => 0.3,
            'hard' => 0.2,
        ],
        'game_month' => [
            'easy' => 0.3,
            'medium' => 0.5,
            'hard' => 0.2
        ],
        'game_quarters' => [
            'easy' => 0.2,
            'medium' => 0.5,
            'hard' => 0.3
        ],
        'game_year' => [
            'easy' => 0.2,
            'medium' => 0.3,
            'hard' => 0.5
        ],
        '40_mark' => [
            'easy' => 0.5,
            'medium' => 0.5,
            'hard' => 0.0
        ],
        '60_mark' => [
            'easy' => 0.5,
            'medium' => 0.25,
            'hard' => 0.25
        ],
        '80_mark' => [
            'easy' => 0.25,
            'medium' => 0.5,
            'hard' => 0.25
        ]
    ]
];
