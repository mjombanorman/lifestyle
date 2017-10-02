<?php

namespace backend\modules\blog\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\blog\models\Posts;

/**
 * PostsSearch represents the model behind the search form about `backend\modules\blog\models\Posts`.
 */
class PostsSearch extends Posts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'post_author_id', 'post_status', 'post_category_id', 'post_like_count', 'post_share_count'], 'integer'],
            [['post_date', 'post_title', 'post_content'], 'safe'],
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
        $query = Posts::find();

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
            'post_id' => $this->post_id,
            'post_date' => $this->post_date,
            'post_author_id' => $this->post_author_id,
            'post_status' => $this->post_status,
            'post_category_id' => $this->post_category_id,
            'post_like_count' => $this->post_like_count,
            'post_share_count' => $this->post_share_count,
        ]);

        $query->andFilterWhere(['like', 'post_title', $this->post_title])
            ->andFilterWhere(['like', 'post_content', $this->post_content]);

        return $dataProvider;
    }
}
