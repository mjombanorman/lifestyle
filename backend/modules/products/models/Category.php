<?php

namespace backend\modules\products\models;

use Yii;
use backend\modules\users\models\User;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $created_by
 * @property string $created_at
 */
class Category extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'inv_category';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['name'], 'required'],
                [['description'], 'string'],
                [['created_by'], 'integer'],
                [['created_at'], 'safe'],
                [['name'], 'string', 'max' => 256],
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
            'created_by' => 'Created By',
            'created_at' => 'Created At',
        ];
    }

    public function getUser() {
        return $this->hasOne(User::classname(), ['id' => 'created_by']);
    }

}
