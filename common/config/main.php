<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@cms', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@web', dirname(dirname(__DIR__)) . '/frontend');

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages'
                ],
                'cms' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages'
                ],
                'web' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages'
                ],
            ]
        ]
    ],
    'language' => 'vi',
    'sourceLanguage' => 'en',
];
