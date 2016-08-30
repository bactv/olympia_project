<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $fullname
 * @property string $birthday
 * @property string $profession
 * @property integer $status
 * @property integer $deleted
 * @property integer $thumb_version
 * @property string $created_time
 * @property string $updated_time
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $last_active_time
 * @property string $admin_group_ids
 */
class AdminDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'fullname'], 'required'],
            [['birthday', 'created_time', 'updated_time', 'last_active_time'], 'safe'],
            [['status', 'deleted', 'thumb_version', 'created_by', 'updated_by'], 'integer'],
            [['username', 'password', 'email', 'fullname', 'profession'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'fullname' => 'Fullname',
            'birthday' => 'Birthday',
            'profession' => 'Profession',
            'status' => 'Status',
            'deleted' => 'Deleted',
            'thumb_version' => 'Thumb Version',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'last_active_time' => 'Last Active Time',
            'admin_group_ids' => 'Admin Group Ids',
        ];
    }
}
