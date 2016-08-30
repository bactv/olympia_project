<?php

namespace backend\models;

use Yii;
use common\behaviors\TimestampBehavior;


class QuestionFormat extends \common\models\QuestionFormatBase
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

    public static function getQuestionFormatById($id)
    {
        return self::find()->where(['id' => $id])->one();
    }

    public static function getAllQuestionFormat()
    {
        return self::find()->where(['status' => QUESTION_FORMAT_ACTIVE])->all();
    }
}