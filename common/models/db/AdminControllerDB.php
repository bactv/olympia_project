<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "admin_controller".
 *
 * @property integer $id
 * @property string $controller
 * @property string $created_time
 * @property string $updated_time
 */
class AdminControllerDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_controller';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['controller'], 'required'],
            [['created_time', 'updated_time'], 'safe'],
            [['controller'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'controller' => 'Controller',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
        ];
    }
}
