<?php

namespace backend\models;

use Yii;
use common\behaviors\TimestampBehavior;

class TypeGame extends \common\models\TypeGameBase
{

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

    public static function getAllTypesGame()
    {
        return self::find()->all();
    }

    public static function getTypeGameById($id)
    {
        return self::find()->where(['id' => $id])->one();
    }
}