<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "admin_group".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $permissions
 * @property string $created_time
 * @property string $updated_time
 * @property integer $status
 */
class AdminGroupDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['permissions'], 'required'],
            [['created_time', 'updated_time'], 'safe'],
            [['status'], 'integer'],
            [['name', 'permissions'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'permissions' => 'Permissions',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
            'status' => 'Status',
        ];
    }
}
