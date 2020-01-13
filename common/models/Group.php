<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property string $group_name
 * @property string $group_info
 * @property int $course_id
 * @property int $teacher_id
 * @property string $days
 * @property string $time
 *
 * @property Course $course
 * @property Teacher $teacher
 * @property GroupStudent[] $groupStudents
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group';
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
            [['group_name', 'group_info', 'course_id', 'teacher_id', 'days', 'time'], 'required'],
            [['group_info'], 'string'],
            [['course_id', 'teacher_id'], 'integer'],
            [['group_name', 'days'], 'string', 'max' => 33],
            [['time'], 'string', 'max' => 22],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_name' => 'Group Name',
            'group_info' => 'Group Info',
            'course_id' => 'Course ID',
            'teacher_id' => 'Teacher ID',
            'days' => 'Days',
            'time' => 'Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupStudents()
    {
        return $this->hasMany(GroupStudent::className(), ['group_id' => 'id']);
    }
}
