<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property string $course_name
 * @property string $course_info
 * @property int $course_prise
 * @property string $course_img
 *
 * @property Group[] $groups
 */
class Course extends \yii\db\ActiveRecord
{
    const ADMIN = 2;
    const MANAGER = 1;
    const CLIENT = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_name', 'course_info', 'course_prise', 'course_img'], 'required'],
            [['course_info'], 'string'],
            [['course_prise'], 'integer'],
            [['course_name'], 'string', 'max' => 33],
            [['course_img'], 'string', 'max' => 111],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_name' => 'Course Name',
            'course_info' => 'Course Info',
            'course_prise' => 'Course Prise',
            'course_img' => 'Course Img',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['course_id' => 'id']);
    }
}
