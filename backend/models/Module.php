<?php

namespace backend\models;

use Yii;
use common\behaviors\TimestampBehavior;


class Module extends \common\models\ModuleBase{

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

    public static function getModuleById($module_id)
    {
        return self::find()->where(['id' => $module_id])->one();
    }
    
    public static function getAllModule()
    {
        return self::find()->where(['status' => MODULE_ACTIVE, 'deleted' => MODULE_NOT_DELETED])->all();
    }
}