<?php

namespace backend\modules\items\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\items\models\ItemSubCategory;

/**
 * ItemSubCategorySearch represents the model behind the search form about `backend\modules\items\models\ItemSubCategory`.
 */
class ItemSubCategorySearch extends ItemSubCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itp_id', 'itm_main_cat_id', 'created_by'], 'integer'],
            [['itp_name', 'itp_description', 'itp_comments', 'itp_logo', 'itp_active', 'itp_status_date', 'date_created'], 'safe'],
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
        $query = ItemSubCategory::find();

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
            'itp_id' => $this->itp_id,
            'itm_main_cat_id' => $this->itm_main_cat_id,
            'itp_status_date' => $this->itp_status_date,
            'date_created' => $this->date_created,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'itp_name', $this->itp_name])
            ->andFilterWhere(['like', 'itp_description', $this->itp_description])
            ->andFilterWhere(['like', 'itp_comments', $this->itp_comments])
            ->andFilterWhere(['like', 'itp_logo', $this->itp_logo])
            ->andFilterWhere(['like', 'itp_active', $this->itp_active]);

        return $dataProvider;
    }
}
