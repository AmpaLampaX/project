<?php

namespace app\models;

use Codeception\Step\Condition;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Faculties;

/**
 * FacultiesSearch represents the model behind the search form of `app\models\Faculties`.
 */
class FacultiesSearch extends Faculties
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['HOME_UNIVERSITY', 'COUNTRY', 'UNIVERSITY_OF_OUTGOING_MOBILITY', 'ERASMUS_ID_CODE', 'CONTACT', 'FIELD_OF_STUDY', 'BACHELOR_PROGRAM', 'MASTER_PROGRAM', 'PhD', 'NUMBER_OF_STUDENTS', 'MOBILITY_DURATION', 'WINTER_DEADLINE', 'SUMMER_DEADLINE'], 'safe'],
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
        
        $query = Faculties::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
        ]);

        $query->andFilterWhere(['like', 'HOME_UNIVERSITY', $this->HOME_UNIVERSITY])
            ->andFilterWhere(['like', 'COUNTRY', $this->COUNTRY])
            ->andFilterWhere(['like', 'UNIVERSITY_OF_OUTGOING_MOBILITY', $this->UNIVERSITY_OF_OUTGOING_MOBILITY])
            ->andFilterWhere(['like', 'ERASMUS_ID_CODE', $this->ERASMUS_ID_CODE])
            ->andFilterWhere(['like', 'CONTACT', $this->CONTACT])
            ->andFilterWhere(['like', 'FIELD_OF_STUDY', $this->FIELD_OF_STUDY])
            ->andFilterWhere(['like', 'BACHELOR_PROGRAM', $this->BACHELOR_PROGRAM])
            ->andFilterWhere(['like', 'MASTER_PROGRAM', $this->MASTER_PROGRAM])
            ->andFilterWhere(['like', 'PhD', $this->PhD])
            ->andFilterWhere(['like', 'NUMBER_OF_STUDENTS', $this->NUMBER_OF_STUDENTS])
            ->andFilterWhere(['like', 'MOBILITY_DURATION', $this->MOBILITY_DURATION])
            ->andFilterWhere(['like', 'WINTER_DEADLINE', $this->WINTER_DEADLINE])
            ->andFilterWhere(['like', 'SUMMER_DEADLINE', $this->SUMMER_DEADLINE]);

        return $dataProvider;
    }
    public function filter($params,$condition)
    {
        
        $query = Faculties::find()->where($condition);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
        ]);

        $query->andFilterWhere(['like', 'HOME_UNIVERSITY', $this->HOME_UNIVERSITY])
            ->andFilterWhere(['like', 'COUNTRY', $this->COUNTRY])
            ->andFilterWhere(['like', 'UNIVERSITY_OF_OUTGOING_MOBILITY', $this->UNIVERSITY_OF_OUTGOING_MOBILITY])
            ->andFilterWhere(['like', 'ERASMUS_ID_CODE', $this->ERASMUS_ID_CODE])
            ->andFilterWhere(['like', 'CONTACT', $this->CONTACT])
            ->andFilterWhere(['like', 'FIELD_OF_STUDY', $this->FIELD_OF_STUDY])
            ->andFilterWhere(['like', 'BACHELOR_PROGRAM', $this->BACHELOR_PROGRAM])
            ->andFilterWhere(['like', 'MASTER_PROGRAM', $this->MASTER_PROGRAM])
            ->andFilterWhere(['like', 'PhD', $this->PhD])
            ->andFilterWhere(['like', 'NUMBER_OF_STUDENTS', $this->NUMBER_OF_STUDENTS])
            ->andFilterWhere(['like', 'MOBILITY_DURATION', $this->MOBILITY_DURATION])
            ->andFilterWhere(['like', 'WINTER_DEADLINE', $this->WINTER_DEADLINE])
            ->andFilterWhere(['like', 'SUMMER_DEADLINE', $this->SUMMER_DEADLINE]);

        return $dataProvider;
    }
}
