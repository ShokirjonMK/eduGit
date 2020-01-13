<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property string $full_name
 * @property string $subject
 * @property string $info
 * @property string $status
 * @property string $started_at
 * @property string $salary
 * @property string $teacher_img
 *
 * @property Group[] $groups
 */
class Teacher extends \yii\db\ActiveRecord
{
    
    const ADMIN = 2;
    const MANAGER = 1;
    const CLIENT = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'subject', 'info',  'salary'], 'required'],
            [['info', 'status'], 'string'],
            [['started_at'], 'safe'],
            [['full_name'], 'string', 'max' => 55],
            [['subject', 'salary'], 'string', 'max' => 22],
            [['teacher_img'], 'string', 'max' => 111],
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
            'subject' => 'Subject',
            'info' => 'Info',
            'status' => 'Status',
            'started_at' => 'Started At',
            'salary' => 'Salary',
            'teacher_img' => 'Teacher Img',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['teacher_id' => 'id']);
    }
    
    public function getUser()
    {
        return $this->hasMany(User::className(), ['user_id' => 'id']);
    }
  
    
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

}
