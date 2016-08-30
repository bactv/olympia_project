<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_time
 * @property string $updated_time
 * @property string $post_time
 * @property integer $thumb_version
 * @property integer $status
 * @property integer $deleted
 */
class NewsDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['created_by', 'updated_by', 'thumb_version', 'status', 'deleted'], 'integer'],
            [['created_time', 'updated_time', 'post_time'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
            'post_time' => 'Post Time',
            'thumb_version' => 'Thumb Version',
            'status' => 'Status',
            'deleted' => 'Deleted',
        ];
    }
}
