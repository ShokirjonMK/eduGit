<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $nomi
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomi'], 'required'],
            [['nomi'], 'string', 'max' => 111],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomi' => 'Nomi',
        ];
    }
}
