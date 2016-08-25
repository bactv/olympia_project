<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $phone
 * @property string $fullname
 * @property string $birthday
 * @property string $school
 * @property string $address
 * @property string $created_time
 * @property string $updated_time
 * @property string $last_active_time
 * @property integer $status
 * @property integer $deleted
 * @property integer $thumb_version
 */
class StudentDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'phone', 'fullname', 'school'], 'required'],
            [['birthday', 'created_time', 'updated_time', 'last_active_time'], 'safe'],
            [['status', 'deleted', 'thumb_version'], 'integer'],
            [['username', 'password', 'email', 'phone', 'fullname', 'school', 'address'], 'string', 'max' => 255],
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
            'phone' => 'Phone',
            'fullname' => 'Fullname',
            'birthday' => 'Birthday',
            'school' => 'School',
            'address' => 'Address',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
            'last_active_time' => 'Last Active Time',
            'status' => 'Status',
            'deleted' => 'Deleted',
            'thumb_version' => 'Thumb Version',
        ];
    }
}
