<?php

namespace backend\models;

use Yii;
use common\behaviors\TimestampBehavior;


class AdminGroup extends \common\models\AdminGroupBase{

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

    public static function getAllGroups()
    {
        return self::find()->where(['status' => ADMIN_GROUP_ACTIVE])->all();
    }

    public static function getGroupById($id)
    {
        return self::find()->where(['id' => $id, 'status' => ADMIN_GROUP_ACTIVE])->one();
    }
}