<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "question_package".
 *
 * @property integer $id
 * @property string $name
 * @property integer $part_game
 * @property string $question_ids
 * @property string $created_time
 * @property string $updated_time
 * @property integer $status
 * @property integer $number_appear
 * @property integer $package_finish
 */
class QuestionPackageDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_package';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'part_game', 'question_ids'], 'required'],
            [['created_time', 'updated_time'], 'safe'],
            [['name', 'question_ids'], 'string', 'max' => 255]
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
            'part_game' => 'Part Game',
            'question_ids' => 'Question Ids',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
            'status' => 'Status',
            'number_appear' => 'Number Appear',
            'package_finish' => 'Package Finish',
        ];
    }
}
