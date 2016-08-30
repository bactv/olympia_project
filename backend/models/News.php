<?php

namespace backend\models;

use Yii;
use common\behaviors\TimestampBehavior;


class News extends \common\models\NewsBase{

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

    public function getAllNews()
    {
        return self::find()->where(['status' => NEWS_ACTIVE, 'deleted' => NEWS_NOT_DELETED])->all();
    }

    public function getNewsById($id)
    {
        return self::find()->where(['id' => $id, 'status' => NEWS_ACTIVE, 'deleted' => NEWS_NOT_DELETED])->all();
    }
}