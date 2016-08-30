<?php

namespace backend\models;

use Yii;


class Answer extends \common\models\AnswerBase
{
    public static function getAnswersByQuestionId($question_id)
    {
        return self::find()->where(['question_id' => $question_id])->all();
    }
}