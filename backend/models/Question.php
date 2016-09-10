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

    public static function getAllQuestions($params = null)
    {
        $number_appear = isset($params['number_appear']) ? $params['number_appear'] : 0;
        
        $query = self::find()->where(['status' => QUESTION_ACTIVE, 'deleted' => QUESTION_NOT_DELETED]);

        if ($number_appear != 0) {
            $query->andWhere(['<>', 'number_appear', 0]);
        } else {
            $query->andWhere(['number_appear' => 0]);
        }

        return $query->all();
    }
    
}