<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita9a48107c4fbe1941506d4e2048ab68b
{
    public static $files = array (
        '2cffec82183ee1cea088009cef9a6fc3' => __DIR__ . '/..' . '/ezyang/htmlpurifier/library/HTMLPurifier.composer.php',
        '2c102faa651ef8ea5874edb585946bce' => __DIR__ . '/..' . '/swiftmailer/swiftmailer/lib/swift_required.php',
    );

    public static $prefixLengthsPsr4 = array (
        'y' => 
        array (
            'yii\\swiftmailer\\' => 16,
            'yii\\httpclient\\' => 15,
            'yii\\gii\\' => 8,
            'yii\\faker\\' => 10,
            'yii\\debug\\' => 10,
            'yii\\composer\\' => 13,
            'yii\\codeception\\' => 16,
            'yii\\bootstrap\\' => 14,
            'yii\\authclient\\' => 15,
            'yii\\' => 4,
        ),
        'l' => 
        array (
            'leandrogehlen\\treegrid\\' => 23,
        ),
        'k' => 
        array (
            'kartik\\select2\\' => 15,
            'kartik\\plugins\\fileinput\\' => 25,
            'kartik\\helpers\\' => 15,
            'kartik\\form\\' => 12,
            'kartik\\file\\' => 12,
            'kartik\\dialog\\' => 14,
            'kartik\\detail\\' => 14,
            'kartik\\datetime\\' => 16,
            'kartik\\date\\' => 12,
            'kartik\\base\\' => 12,
        ),
        'd' => 
        array (
            'dosamigos\\ckeditor\\' => 19,
        ),
        'c' => 
        array (
            'cebe\\markdown\\' => 14,
        ),
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'yii\\swiftmailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-swiftmailer',
        ),
        'yii\\httpclient\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-httpclient',
        ),
        'yii\\gii\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-gii',
        ),
        'yii\\faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-faker',
        ),
        'yii\\debug\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-debug',
        ),
        'yii\\composer\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-composer',
        ),
        'yii\\codeception\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-codeception',
        ),
        'yii\\bootstrap\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-bootstrap',
        ),
        'yii\\authclient\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-authclient',
        ),
        'yii\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2',
        ),
        'leandrogehlen\\treegrid\\' => 
        array (
            0 => __DIR__ . '/..' . '/leandrogehlen/yii2-treegrid',
        ),
        'kartik\\select2\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-widget-select2',
        ),
        'kartik\\plugins\\fileinput\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/bootstrap-fileinput',
        ),
        'kartik\\helpers\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-helpers',
        ),
        'kartik\\form\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-widget-activeform',
        ),
        'kartik\\file\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-widget-fileinput',
        ),
        'kartik\\dialog\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-dialog',
        ),
        'kartik\\detail\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-detail-view',
        ),
        'kartik\\datetime\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-widget-datetimepicker',
        ),
        'kartik\\date\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-widget-datepicker',
        ),
        'kartik\\base\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-krajee-base',
        ),
        'dosamigos\\ckeditor\\' => 
        array (
            0 => __DIR__ . '/..' . '/2amigos/yii2-ckeditor-widget/src',
        ),
        'cebe\\markdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/cebe/markdown',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static $prefixesPsr0 = array (
        'H' => 
        array (
            'HTMLPurifier' => 
            array (
                0 => __DIR__ . '/..' . '/ezyang/htmlpurifier/library',
            ),
        ),
        'D' => 
        array (
            'Diff' => 
            array (
                0 => __DIR__ . '/..' . '/phpspec/php-diff/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita9a48107c4fbe1941506d4e2048ab68b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita9a48107c4fbe1941506d4e2048ab68b::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInita9a48107c4fbe1941506d4e2048ab68b::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
