<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "package_finish".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $number_question
 * @property string $time_reply
 * @property string $score_question
 */
class PackageFinishDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'package_finish';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'number_question', 'time_reply', 'score_question'], 'required'],
            [['description'], 'string'],
            [['number_question'], 'integer'],
            [['name', 'time_reply', 'score_question'], 'string', 'max' => 255]
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
            'number_question' => 'Number Question',
            'time_reply' => 'Time Reply',
            'score_question' => 'Score Question',
        ];
    }
}
