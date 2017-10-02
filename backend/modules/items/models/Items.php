<?php

namespace backend\modules\items\models;

use Yii;
use backend\modules\items\models\ItemMainCategory;
use backend\modules\items\models\ItemModels;
use backend\modules\items\models\ItemSubCategory;
use backend\modules\items\models\ItemManu;
use backend\modules\shop\models\Shops;

/**
 * This is the model class for table "items".
 *
 * @property integer $itm_id
 * @property integer $itm_cat_id
 * @property integer $itm_sub_cat_id
 * @property string $itm_name
 * @property string $itm_desc
 * @property integer $itm_reviews
 * @property string $itm_status
 * @property string $itm_status_date
 * @property integer $itm_man_id
 * @property double $itm_price
 * @property string $itm_usage
 * @property string $itm_model
 * @property string $itm_serial
 * @property string $itm_uom
 * @property string $date_created
 * @property integer $created_by
 * @property string $itm_active
 */
class Items extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'items';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['itm_cat_id', 'itm_sub_cat_id', 'itm_name', 'itm_desc', 'itm_man_id', 'itm_price', 'created_by', 'itm_shop_id', 'itm_model'], 'required'],
            [['itm_cat_id', 'itm_sub_cat_id', 'itm_reviews', 'itm_man_id', 'created_by', 'itm_model'], 'integer'],
            [['itm_desc', 'itm_usage'], 'string'],
            [['itm_status_date', 'date_created'], 'safe'],
            [['itm_price'], 'number'],
            [['itm_name'], 'string', 'max' => 100],
            [['itm_status'], 'string', 'max' => 5],
            [['itm_serial', 'itm_uom'], 'string', 'max' => 50],
            [['itm_active'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'itm_id' => 'Item ID',
            'itm_cat_id' => 'Category',
            'itm_sub_cat_id' => 'SubCategory',
            'itm_name' => 'Item Name',
            'itm_desc' => 'Description(Specification)',
            'itm_reviews' => 'Item Reviews',
            'itm_status' => 'Itm Status',
            'itm_status_date' => 'Itm Status Date',
            'itm_man_id' => 'Manufacturer/Make',
            'itm_price' => 'Price',
            'itm_usage' => 'Itm Usage',
            'itm_model' => 'Model',
            'itm_image' => 'Image',
            'itm_img_id' => 'Images',
            'itm_serial' => 'Serial',
            'itm_uom' => 'Itm Uom',
            'itm_shop_id' => 'Shop',
            'date_created' => 'Date Created',
            'created_by' => 'Created By',
            'itm_active' => 'Itm Active',
        ];
    }

    public function getManu() {
        return $this->hasOne(ItemManu::className(), ['id' => 'itm_man_id']);
    }

    public function getCategory() {
        return $this->hasOne(ItemMainCategory::className(), ['ict_id' => 'itm_cat_id']);
    }

    public function getSubCategory() {
        return $this->hasOne(ItemSubCategory::className(), ['itp_id' => 'itm_sub_cat_id']);
    }

    public function getModel() {
        return $this->hasOne(ItemModels::className(), ['id' => 'itm_model']);
    }

    public function getShop() {
        return $this->hasOne(Shops::className(), ['id' => 'itm_shop_id']);
    }

}
