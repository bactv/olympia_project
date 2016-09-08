<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "type_question".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $description
 * @property string $created_time
 * @property string $updated_time
 * @property integer $status
 */
class TypeQuestionDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['created_time', 'updated_time'], 'safe'],
            [['status'], 'integer'],
            [['name', 'code', 'description'], 'string', 'max' => 255]
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
            'code' => 'Code',
            'description' => 'Description',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
            'status' => 'Status',
        ];
    }
}
