<?php

namespace backend\modules\items\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\items\models\ItemMainCategory;

/**
 * ItemMainCategorySearch represents the model behind the search form about `backend\modules\items\models\ItemMainCategory`.
 */
class ItemMainCategorySearch extends ItemMainCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ict_id', 'created_by'], 'integer'],
            [['ict_name', 'ict_desc', 'ict_usage', 'ict_uom', 'date_created'], 'safe'],
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
        $query = ItemMainCategory::find();

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
            'ict_id' => $this->ict_id,
            'date_created' => $this->date_created,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'ict_name', $this->ict_name])
            ->andFilterWhere(['like', 'ict_desc', $this->ict_desc])
            ->andFilterWhere(['like', 'ict_usage', $this->ict_usage])
            ->andFilterWhere(['like', 'ict_uom', $this->ict_uom]);

        return $dataProvider;
    }
}
