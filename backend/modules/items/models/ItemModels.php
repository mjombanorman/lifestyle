<?php

namespace backend\modules\items\models;

use Yii;
use backend\modules\items\models\ItemManu;
use backend\modules\users\models\User;

/**
 * This is the model class for table "item_models".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $man_id
 * @property integer $review_id
 * @property string $created_at
 * @property integer $created_by
 */
class ItemModels extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'item_models';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'name', 'man_id'], 'required'],
            [['id', 'man_id', 'review_id', 'created_by'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'description'], 'string', 'max' => 45],
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
            'man_id' => 'Manufacturer/Make',
            'review_id' => 'Review ID',
            'created_at' => 'Date Created',
            'created_by' => 'Created By',
        ];
    }

    public function getMake() {
        return $this->hasOne(ItemManu::className(), ['id' => 'man_id']);
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

}
