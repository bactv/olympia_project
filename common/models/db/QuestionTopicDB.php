<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "question_topic".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property string $created_time
 * @property string $updated_time
 */
class QuestionTopicDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_topic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
