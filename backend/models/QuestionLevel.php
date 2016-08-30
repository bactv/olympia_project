<?php

namespace backend\models;

use Yii;
use common\behaviors\TimestampBehavior;


class QuestionLevel extends \common\models\QuestionLevelBase
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

    public static function getQuestionLevelById($id)
    {
        return self::find()->where(['id' => $id])->one();
    }

    public static function getAllQuestionLevel()
    {
        return self::find()->where(['status' => QUESTION_LEVEL_ACTIVE])->all();
    }
}