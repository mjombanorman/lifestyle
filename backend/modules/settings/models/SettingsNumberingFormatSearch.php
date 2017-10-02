<?php

namespace backend\modules\settings\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\settings\models\SettingsNumberingFormat;

/**
 * SettingsNumberingFormatSearch represents the model behind the search form about `backend\modules\settings\models\SettingsNumberingFormat`.
 */
class SettingsNumberingFormatSearch extends SettingsNumberingFormat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'next_number', 'min_digits', 'created_by'], 'integer'],
            [['type', 'description', 'prefix', 'suffix', 'preview', 'module', 'date_created'], 'safe'],
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
        $query = SettingsNumberingFormat::find();

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
            'next_number' => $this->next_number,
            'min_digits' => $this->min_digits,
            'date_created' => $this->date_created,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'prefix', $this->prefix])
            ->andFilterWhere(['like', 'suffix', $this->suffix])
            ->andFilterWhere(['like', 'preview', $this->preview])
            ->andFilterWhere(['like', 'module', $this->module]);

        return $dataProvider;
    }
}
