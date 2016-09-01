<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'apps'=> ['backend', 'frontend'],

    'type_question' => [
        'reply' => 1,
        'multiple-choice' => 2,
    ],

    'type_game' => [
        'game_week' => 1,
        'game_month' => 2,
        'game_quarters' => 3,
        'game_year' => 4,
    ],

    'part_game' => [
        'start' => 1,
        'obstacle_race' => 2,
        'accelerate' => 3,
        'end' => 4
    ],

    'question_level' => [
        'easy' => [
            'id' => 1,
            'probability' => 50
        ],
        'medium' => [
            'id' => 1,
            'probability' => 30
        ],
        'hard' => [
            'id' => 3,
            'probability' => 20
        ]
    ]
];
