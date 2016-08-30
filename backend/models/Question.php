<?php

namespace backend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use common\behaviors\TimestampBehavior;


class Question extends \common\models\QuestionBase
{
    public $answer;

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
            [
                'class' => BlameableBehavior::className(),
                'attributes' => [
                    'createdByAttribute' => 'created_by',
                    'updatedByAttribute' => 'updated_by',
                ]
            ]
        ];
    }
}