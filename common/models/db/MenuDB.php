<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $action_link
 * @property string $created_time
 * @property string $updated_time
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
            [['category_id', 'name', 'action_link'], 'required'],
            [['category_id'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['name', 'action_link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'action_link' => 'Action Link',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
        ];
    }
}
