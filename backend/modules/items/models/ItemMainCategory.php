<?php

namespace backend\modules\items\models;

use Yii;
use backend\modules\users\models\User;

/**
 * This is the model class for table "item_main_category".
 *
 * @property integer $ict_id
 * @property string $ict_name
 * @property string $ict_desc
 * @property string $ict_usage
 * @property string $ict_uom
 * @property string $date_created
 * @property integer $created_by
 */
class ItemMainCategory extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'item_main_category';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ict_name', 'created_by'], 'required'],
            [['ict_desc', 'ict_usage'], 'string'],
            [['date_created'], 'safe'],
            [['created_by'], 'integer'],
            [['ict_name', 'ict_uom'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ict_id' => 'Category ID',
            'ict_name' => 'Category Name',
            'ict_desc' => 'Category Description',
            'ict_usage' => 'Category Usage',
            'ict_uom' => 'Category Uom',
            'date_created' => 'Date Created',
            'created_by' => 'Added By',
        ];
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

}
