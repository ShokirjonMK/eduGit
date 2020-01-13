<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $full_name
 * @property string $phone_number
 * @property string $started_at
 * @property string $date_of_birth
 * @property string $address
 * @property string $login
 * @property string $password
*
 * @property GroupStudent[] $groupStudents
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    
    const ADMIN = 2;
    const MANAGER = 1;
    const CLIENT = 0;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'phone_number', 'started_at', 'date_of_birth', 'address'], 'required'],
            [['started_at', 'date_of_birth'], 'safe'],
            [['full_name'], 'string', 'max' => 55],
            [['phone_number'], 'string', 'max' => 11],
            [['address'], 'string', 'max' => 77],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'user_id' => 'User Id',
            'group_id' => 'Group Id',
            'phone_number' => 'Phone Number',
            'started_at' => 'Started At',
            'date_of_birth' => 'Date Of Birth',
            'address' => 'Address',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupStudents()
    {
        return $this->hasMany(GroupStudent::className(), ['student_id' => 'id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'id']);
    }
}
