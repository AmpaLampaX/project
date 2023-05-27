<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Proba;

/**
 * ProbaSearch represents the model behind the search form of `app\models\Proba`.
 */
class ProbaSearch extends Proba
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ad', 'bd', 'cd', 'md'], 'integer'],
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
        
        $query = Proba::find();
    

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
            'ad' => $this->ad,
            'bd' => $this->bd,
            'cd' => $this->cd,
            'md' => $this->md,
        ]);

        return $dataProvider;
    }

    public function filter($params,$condition)
    {
        $query = Proba::find()->where($condition);

    

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
            'ad' => $this->ad,
            'bd' => $this->bd,
            'cd' => $this->cd,
            'md' => $this->md,
        ]);

        return $dataProvider;
    }
}
