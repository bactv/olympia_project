<?php

namespace backend\models;

use Yii;
use common\behaviors\TimestampBehavior;


class PartGame extends \common\models\PartGameBase{

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['created_time', 'updated_time'],
                    self::EVENT_BEFORE_UPDATE => ['updated_time'],
                ]
            ]
        ];
    }

    public static function getPartGameById($id)
    {
        return self::find()->where(['id' => $id])->one();
    }

    public static function getAllPartsGame()
    {
        return self::find()->all();
    }
}