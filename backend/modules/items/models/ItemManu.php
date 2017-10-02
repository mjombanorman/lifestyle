<?php

namespace backend\modules\items\models;

use Yii;
use backend\modules\users\models\User;

/**
 * This is the model class for table "item_manu".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $logo
 * @property string $website
 * @property string $email
 * @property integer $created_by
 * @property string $created_at
 */
class ItemManu extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'item_manu';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['name'], 'unique'],
            [['description'], 'string'],
            [['created_by'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'logo', 'website', 'email'], 'string', 'max' => 45],
            [['email'], 'email'],
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
            'logo' => 'Logo',
            'website' => 'Website',
            'email' => 'Email',
            'created_by' => 'Created By',
            'created_at' => 'Date Created',
        ];
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

}
