<?php

namespace backend\modules\items\models;

use Yii;
use backend\modules\items\models\ItemMainCategory;
use backend\modules\users\models\User;

/**
 * This is the model class for table "item_sub_category".
 *
 * @property integer $itp_id
 * @property integer $itm_main_cat_id
 * @property string $itp_name
 * @property string $itp_description
 * @property string $itp_comments
 * @property string $itp_logo
 * @property string $itp_active
 * @property string $itp_status_date
 * @property string $date_created
 * @property integer $created_by
 */
class ItemSubCategory extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'item_sub_category';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['itm_main_cat_id', 'itp_name', 'created_by'], 'required'],
            [['itm_main_cat_id', 'created_by'], 'integer'],
            [['itp_description', 'itp_comments'], 'string'],
            [['itp_status_date', 'date_created'], 'safe'],
            [['itp_name', 'itp_logo'], 'string', 'max' => 128],
            [['itp_active'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'itp_id' => 'Itp ID',
            'itm_main_cat_id' => 'Main Category Name',
            'itp_name' => 'Sub Category Name',
            'itp_description' => 'Description',
            'itp_comments' => 'Itp Comments',
            'itp_logo' => 'Itp Logo',
            'itp_active' => 'Itp Active',
            'itp_status_date' => 'Itp Status Date',
            'date_created' => 'Date Created',
            'created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     * Custom Relations
     */
    public function getCategory() {
        return $this->hasOne(ItemMainCategory::className(), ['ict_id' => 'itm_main_cat_id']);
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

}
