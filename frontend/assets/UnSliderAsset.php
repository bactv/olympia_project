<?php
/**
 * Created by PhpStorm.
 * User: bac
 * Date: 25/08/2016
 * Time: 14:25
 */
namespace frontend\assets;

use yii\web\AssetBundle;

class UnSliderAsset extends AssetBundle
{
    public $sourcePath = '@bower/unslider/dist';
    public $css = [
        'css/unslider.css'
    ];
    public $js = [
        'js/unslider-min.js'
    ];

    public function init()
    {
        parent::init();

        $this->publishOptions['beforeCopy'] = function ($from, $to) {
            return preg_match('%(/|\\\\)(fonts|css)%', $from);
        };
    }
}