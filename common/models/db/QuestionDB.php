<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property integer $id
 * @property string $content
 * @property integer $question_topic
 * @property integer $question_level
 * @property integer $question_format
 * @property integer $type_question
 * @property string $created_time
 * @property string $updated_time
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $status
 * @property integer $deleted
 * @property integer $number_appear
 * @property integer $admin
 */
class QuestionDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'question_topic', 'question_level', 'question_format', 'type_question', 'admin'], 'required'],
            [['content'], 'string'],
            [['question_topic', 'question_level', 'question_format', 'type_question', 'created_by', 'updated_by', 'status', 'deleted', 'number_appear', 'admin'], 'integer'],
            [['created_time', 'updated_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'question_topic' => 'Question Topic',
            'question_level' => 'Question Level',
            'question_format' => 'Question Format',
            'type_question' => 'Type Question',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'status' => 'Status',
            'deleted' => 'Deleted',
            'number_appear' => 'Number Appear',
            'admin' => 'Admin',
        ];
    }
}
