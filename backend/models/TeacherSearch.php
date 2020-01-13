<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Teacher;

/**
 * TeacherSearch represents the model behind the search form of `common\models\Teacher`.
 */
class TeacherSearch extends Teacher
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['full_name', 'subject', 'user_id', 'info', 'status', 'started_at', 'salary', 'teacher_img'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Teacher::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'started_at' => $this->started_at,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'salary', $this->salary])
            ->andFilterWhere(['like', 'teacher_img', $this->teacher_img]);

        return $dataProvider;
    }
}