<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "davomat".
 *
 * @property int $id
 * @property int $group_id
 * @property int $student_id
 * @property string $date
 * @property string $yes_no
 *
 * @property Group $group
 * @property Student $student
 */
class Davomat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'davomat';
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
            [['group_id', 'student_id', 'date', 'yes_no'], 'required'],
            [['group_id', 'student_id'], 'integer'],
            [['date'], 'safe'],
            [['yes_no'], 'string'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'student_id' => 'Student ID',
            'date' => 'Date',
            'yes_no' => 'Yes No',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }
}
