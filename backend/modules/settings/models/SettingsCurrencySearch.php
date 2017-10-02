<?php

namespace backend\modules\settings\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\settings\models\SettingsCurrency;

/**
 * SettingsCurrencySearch represents the model behind the search form about `backend\modules\settings\models\SettingsCurrency`.
 */
class SettingsCurrencySearch extends SettingsCurrency
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_active', 'decimal_places', 'created_by'], 'integer'],
            [['code', 'description', 'symbol', 'decimal_separator', 'thousands_separator', 'date_created'], 'safe'],
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
        $query = SettingsCurrency::find();

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
            'is_active' => $this->is_active,
            'decimal_places' => $this->decimal_places,
            'date_created' => $this->date_created,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'symbol', $this->symbol])
            ->andFilterWhere(['like', 'decimal_separator', $this->decimal_separator])
            ->andFilterWhere(['like', 'thousands_separator', $this->thousands_separator]);

        return $dataProvider;
    }
}
