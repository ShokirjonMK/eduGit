<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property int $name
 * @property int $buy_amount
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'buy_amount'], 'required'],
            [['name', 'buy_amount'], 'safe'],
            [['name'], 'string'],
            [[ 'buy_amount'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'buy_amount' => 'Buy Amount',
        ];
    }
}
