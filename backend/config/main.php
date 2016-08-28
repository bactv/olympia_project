<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'cookieValidationKey' => '6VehvOH_JIkJ7JymtY0Oel-dSUzzLRT7',
        ],
        'user' => [
            'identityClass' => 'backend\models\Admin',
            'enableAutoLogin' => true,
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
        ],
        
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ]
        ],
        'view' => [
            'theme' => [
                'class'=>'common\components\Theme',
                'active' => 'default',
                'pathMap' => [
                    '@app/views' => [
                        '@backend/views'
                    ]
                ]
            ]
        ],
    ],
    'params' => $params,
    'defaultRoute' => 'default',
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '::1', '118.70.124.143', '113.190.252.218', '183.81.9.171', '123.25.21.138'],

            'generators' => [
                'crud'   => [
                    'class'     => 'backend\templates\gii\crud\Generator',
                ],
                'model'   => [
                    'class'     => 'backend\templates\gii\model\Generator'
                ],
            ]
        ],
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['127.0.0.1', '::1', '118.70.124.143', '113.190.252.218', '183.81.9.171', '123.25.21.138'],

        ]
    ],
];
