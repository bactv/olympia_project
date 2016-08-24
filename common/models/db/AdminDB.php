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
 * @property integer $status
 * @property integer $deleted
 * @property string $created_time
 * @property string $updated_time
 * @property string $created_by
 * @property string $updated_by
 * @property string $last_login_time
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
            [['id', 'username', 'password', 'email', 'fullname'], 'required'],
            [['id', 'status', 'deleted'], 'integer'],
            [['created_time', 'updated_time', 'created_by', 'updated_by', 'last_login_time'], 'safe'],
            [['username', 'password', 'email', 'fullname'], 'string', 'max' => 255],
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
            'status' => 'Status',
            'deleted' => 'Deleted',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'last_login_time' => 'Last Login Time',
        ];
    }
}
