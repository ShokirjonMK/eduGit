<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $subject
 * @property string $email
 * @property string $message_body
 * @property string $datetime
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'subject', 'email', 'message_body'], 'required'],
            [['message_body'], 'string'],
            [['datetime'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 22],
            [['subject'], 'string', 'max' => 33],
            [['email'], 'string', 'max' => 55],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'subject' => 'Subject',
            'email' => 'Email',
            'message_body' => 'Message Body',
            'datetime' => 'Datetime',
        ];
    }
}
