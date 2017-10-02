<?php

namespace backend\modules\settings\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\settings\models\SettingsSubCounties;

/**
 * SettingsSubCountiesSearch represents the model behind the search form about `backend\modules\settings\models\SettingsSubCounties`.
 */
class SettingsSubCountiesSearch extends SettingsSubCounties
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['county_code', 'const_code'], 'number'],
            [['const_name'], 'safe'],
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
        $query = SettingsSubCounties::find();

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
            'county_code' => $this->county_code,
            'const_code' => $this->const_code,
        ]);

        $query->andFilterWhere(['like', 'const_name', $this->const_name]);

        return $dataProvider;
    }
}
