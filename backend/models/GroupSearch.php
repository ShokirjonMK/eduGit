<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Group;

/**
 * GroupSearch represents the model behind the search form of `common\models\Group`.
 */
class GroupSearch extends Group
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'course_id', 'teacher_id'], 'integer'],
            [['group_name', 'group_info', 'days', 'time'], 'safe'],
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
        $query = Group::find();

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
            'course_id' => $this->course_id,
            'teacher_id' => $this->teacher_id,
        ]);

        $query->andFilterWhere(['like', 'group_name', $this->group_name])
            ->andFilterWhere(['like', 'group_info', $this->group_info])
            ->andFilterWhere(['like', 'days', $this->days])
            ->andFilterWhere(['like', 'time', $this->time]);

        return $dataProvider;
    }
}
