<?php

namespace backend\modules\settings\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\settings\models\SettingsCounties;

/**
 * SettingsCountiesSearch represents the model behind the search form about `backend\modules\settings\models\SettingsCounties`.
 */
class SettingsCountiesSearch extends SettingsCounties
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['county', 'tour', 'former_province', 'capital'], 'safe'],
            [['area', 'population_census_2009'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = SettingsCounties::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'area' => $this->area,
            'population_census_2009' => $this->population_census_2009,
        ]);

        $query->andFilterWhere(['like', 'county', $this->county])
            ->andFilterWhere(['like', 'tour', $this->tour])
            ->andFilterWhere(['like', 'former_province', $this->former_province])
            ->andFilterWhere(['like', 'capital', $this->capital]);

        return $dataProvider;
    }
}
