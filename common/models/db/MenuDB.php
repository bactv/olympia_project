<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property integer $module_id
 * @property string $router
 * @property string $created_time
 * @property string $updated_time
 * @property integer $status
 * @property integer $deleted
 * @property string $icon
 */
class MenuDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'module_id', 'status', 'deleted'], 'integer'],
            [['module_id', 'router'], 'required'],
            [['created_time', 'updated_time'], 'safe'],
            [['name', 'router', 'icon'], 'string', 'max' => 255]
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
            'parent_id' => 'Parent ID',
            'module_id' => 'Module ID',
            'router' => 'Router',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
            'status' => 'Status',
            'deleted' => 'Deleted',
            'icon' => 'Icon',
        ];
    }
}
