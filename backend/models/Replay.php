<?php

namespace backend\models;

use Yii;
use common\models\Message;

/**
 * This is the model class for table "replay".
 *
 * @property int $id
 * @property int $user_id
 * @property int $message_id
 * @property string $message_body
 *
 * @property Message $message
 * @property User $user
 */
class Replay extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'replay';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'message_id', 'message_body'], 'required'],
            [['user_id', 'message_id'], 'integer'],
            [['message_body'], 'string'],
            [['message_id'], 'exist', 'skipOnError' => true, 'targetClass' => Message::className(), 'targetAttribute' => ['message_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'message_id' => 'Message ID',
            'message_body' => 'Message Body',
            'datetime' => 'Datetime',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessage()
    {
        return $this->hasOne(Message::className(), ['id' => 'message_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
