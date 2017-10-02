<?php

namespace backend\modules\items\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\items\models\Items;

/**
 * ItemsSearch represents the model behind the search form about `backend\modules\items\models\Items`.
 */
class ItemsSearch extends Items
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itm_id', 'itm_cat_id', 'itm_sub_cat_id', 'itm_reviews', 'itm_man_id', 'created_by'], 'integer'],
            [['itm_name', 'itm_desc', 'itm_status', 'itm_status_date', 'itm_usage', 'itm_model', 'itm_serial', 'itm_uom', 'date_created', 'itm_active'], 'safe'],
            [['itm_price'], 'number'],
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
        $query = Items::find();

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
            'itm_id' => $this->itm_id,
            'itm_cat_id' => $this->itm_cat_id,
            'itm_sub_cat_id' => $this->itm_sub_cat_id,
            'itm_reviews' => $this->itm_reviews,
            'itm_status_date' => $this->itm_status_date,
            'itm_man_id' => $this->itm_man_id,
            'itm_price' => $this->itm_price,
            'date_created' => $this->date_created,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'itm_name', $this->itm_name])
            ->andFilterWhere(['like', 'itm_desc', $this->itm_desc])
            ->andFilterWhere(['like', 'itm_status', $this->itm_status])
            ->andFilterWhere(['like', 'itm_usage', $this->itm_usage])
            ->andFilterWhere(['like', 'itm_model', $this->itm_model])
            ->andFilterWhere(['like', 'itm_serial', $this->itm_serial])
            ->andFilterWhere(['like', 'itm_uom', $this->itm_uom])
            ->andFilterWhere(['like', 'itm_active', $this->itm_active]);

        return $dataProvider;
    }
}
