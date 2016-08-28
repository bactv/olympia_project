<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "admin_action".
 *
 * @property integer $id
 * @property integer $controller_id
 * @property string $action
 * @property string $created_time
 * @property string $updated_time
 */
class AdminActionDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_action';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['controller_id', 'action'], 'required'],
            [['controller_id'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['action'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'controller_id' => 'Controller ID',
            'action' => 'Action',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
        ];
    }
}
