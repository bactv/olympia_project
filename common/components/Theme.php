<?php
/**
 * Created by PhpStorm.
 * User: bac_b
 * Date: 24/08/2016
 * Time: 2:23 CH
 */

namespace common\components;

use Yii;

class Theme extends \yii\base\Theme
{
    public $active;

    /**
     * @see yii\base\Theme::init()
     */
    public function init()
    {
        parent::init();

        if ($this->baseUrl === null) {
            $this->baseUrl = '@web/themes/' . $this->active;
        }
        $this->baseUrl = rtrim(Yii::getAlias($this->baseUrl), '/');

        if ($this->basePath === null) {
            $this->basePath = '@webroot/themes/' . $this->active;
        }
        $this->basePath = Yii::getAlias($this->basePath);

        if (empty($this->pathMap)) {
            $this->pathMap = [Yii::$app->getBasePath() => [$this->basePath]];
        }
    }
}