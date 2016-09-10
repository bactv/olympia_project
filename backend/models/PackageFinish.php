<?php

namespace backend\models;

use Yii;


class PackageFinish extends \common\models\PackageFinishBase
{
    public static function getAllPackageFinish()
    {
        return self::find()->all();
    }

    public static function getPackageFinishById($id)
    {
        return self::find()->where(['id' => $id])->one();
    }
}