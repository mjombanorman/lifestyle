<?php

namespace backend\modules\items\models;

use Yii;

/**
 * This is the model class for table "item_ratings".
 *
 * @property integer $id
 * @property string $item_id
 * @property double $rating
 * @property string $current_date
 */
class ItemRatings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_ratings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['rating'], 'number'],
            [['current_date'], 'safe'],
            [['item_id'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'rating' => 'Rating',
            'current_date' => 'Current Date',
        ];
    }
}
