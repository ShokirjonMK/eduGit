<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Davomat as DavomatModel;

/**
 * Davomat represents the model behind the search form of `common\models\Davomat`.
 */
class Davomat extends DavomatModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'group_id', 'student_id'], 'integer'],
            [['date', 'yes_no'], 'safe'],
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
        $query = DavomatModel::find();

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
            'group_id' => $this->group_id,
            'student_id' => $this->student_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'yes_no', $this->yes_no]);

        return $dataProvider;
    }
}
