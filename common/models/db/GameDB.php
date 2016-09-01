<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "game".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $type_game
 * @property string $date
 * @property string $data_game
 * @property integer $num_game
 */
class GameDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type_game', 'date', 'data_game'], 'required'],
            [['description', 'data_game'], 'string'],
            [['type_game', 'num_game'], 'integer'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255]
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
            'type_game' => 'Type Game',
            'date' => 'Date',
            'data_game' => 'Data Game',
            'num_game' => 'Num Game',
        ];
    }
}
