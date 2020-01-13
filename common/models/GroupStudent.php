<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "group_student".
 *
 * @property int $id
 * @property int $group_id
 * @property int $student_id
 *
 * @property Student $student
 * @property Group $group
 */
class GroupStudent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'student_id'], 'required'],
            [['group_id', 'student_id'], 'integer'],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }


    const ADMIN = 2;
    const MANAGER = 1;
    const CLIENT = 0;

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {   
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'student_id' => 'Student ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }
}
