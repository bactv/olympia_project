<?php

namespace backend\models;

use Yii;
use common\behaviors\TimestampBehavior;


class QuestionPackage extends \common\models\QuestionPackageBase
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['created_time', 'updated_time'],
                    self::EVENT_BEFORE_UPDATE => ['updated_time']
                ]
            ]
        ];
    }

    public static function chooseQuestionPackage($part_game)
    {
        $question_level_ids = [];
        foreach (QuestionLevel::getAllQuestionLevel() as $level) {
            $question_level_ids[] = $level->id;
        }

    }

    private function randomQuestionWithProbability($level, $arr_question_ids)
    {
    }
}