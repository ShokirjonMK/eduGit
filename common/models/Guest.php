<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guest".
 *
 * @property int $id
 * @property string $full_name
 * @property string $username
 * @property string $password
 * @property string $email
 */
class Guest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guest';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'username', 'password', 'email'], 'required'],
            [['full_name', 'username', 'password', 'email'], 'string', 'max' => 111],
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
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

	public static function findIdentityByAccessToken($token, $type = null)
    {
       throw new NotSupportedException();
    }

	public function getId()
    {
        return $this->id;
    }

	 public function getAuthKey()
    {
        throw new NotSupportedException();
    }

	public function validateAuthKey($authKey)
    {
        throw new NotSupportedException();
    }

	public static function findByUsername($username){

		return self::findOne(['username'=>\yii\helpers\Html::encode($username)]);
	}

	public function validatePassword($password){

		return $this->password === \yii\helpers\Html::encode($password);
	}

    
}
