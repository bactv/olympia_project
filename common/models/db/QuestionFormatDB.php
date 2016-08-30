<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "question_format".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property string $created_time
 * @property string $updated_time
 */
class QuestionFormatDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_format';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['status'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
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
            'status' => 'Status',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
        ];
    }
}
