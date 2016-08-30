<?php

namespace backend\models;

use Yii;
use common\behaviors\TimestampBehavior;


class TypeQuestion extends \common\models\TypeQuestionBase
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
            ],
        ];
    }

    public static function getTypeQuestionById($id)
    {
        return self::find()->where(['id' => $id])->one();
    }

    public static function getAllTypeQuestion()
    {
        return self::find()->where(['status' => TYPE_QUESTION_ACTIVE])->all();
    }
}