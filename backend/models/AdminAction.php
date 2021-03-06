<?php

namespace backend\models;

use Yii;
use common\behaviors\TimestampBehavior;

class AdminAction extends \common\models\AdminActionBase{

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
}