<?php

namespace backend\models;

use Yii;
use common\behaviors\TimestampBehavior;


class QuestionTopic extends \common\models\QuestionTopicBase
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

    public static function getQuestionTopicById($id)
    {
        return self::find()->where(['id' => $id])->one();
    }

    public static function getAllQuestionTopic()
    {
        return self::find()->where(['status' => QUESTION_TOPIC_ACTIVE])->all();
    }
}