<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "module".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $created_time
 * @property string $updated_time
 * @property integer $status
 * @property integer $deleted
 */
class ModuleDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'module';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_time', 'updated_time'], 'safe'],
            [['status', 'deleted'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255]
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
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
            'status' => 'Status',
            'deleted' => 'Deleted',
        ];
    }
}
