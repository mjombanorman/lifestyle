<?php

namespace backend\modules\products\models;

use Yii;
use backend\modules\users\models\User;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $prod_img
 * @property double $price
 * @property integer $category_id
 * @property integer $created_by
 * @property string $created_at
 */
class Products extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'inv_products';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['name', 'prod_img', 'price', 'category_id'], 'required'],
                [['description'], 'string'],
                [['price'], 'number'],
                [['category_id', 'status', 'created_by'], 'integer'],
                [['created_at'], 'safe'],
                [['name', 'prod_img'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'prod_img' => 'Product Image ',
            'price' => 'Price',
            'category_id' => 'Category',
            'created_by' => 'Created By',
            'created_at' => 'Date Created',
        ];
    }

    public function getCategory() {
        return $this->hasOne(Category::classname(), ['id' => 'category_id']);
    }

    public function getUser() {
        return $this->hasOne(User::classname(), ['id' => 'created_by']);
    }

}
