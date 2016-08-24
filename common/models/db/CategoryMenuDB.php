<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "category_menu".
 *
 * @property integer $id
 * @property string $name
 * @property integer $module_id
 * @property string $created_time
 * @property string $updated_time
 */
class CategoryMenuDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'module_id'], 'required'],
            [['module_id'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
            'module_id' => 'Module ID',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
        ];
    }
}
