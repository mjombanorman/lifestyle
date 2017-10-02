<?php

namespace backend\modules\blog\models;

use Yii;
use backend\modules\users\models\User;

/**
 * This is the model class for table "blog_category".
 *
 * @property integer $cat_id
 * @property string $cat_name
 * @property string $cat_desc
 * @property string $created_at
 * @property integer $created_by
 */
class Category extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'blog_category';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['cat_name', 'cat_desc', 'created_by'], 'required'],
                [['cat_desc'], 'string'],
                [['created_at'], 'safe'],
                [['created_by'], 'integer'],
                [['cat_name'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'cat_id' => 'Cat ID',
            'cat_name' => 'Category Name',
            'cat_desc' => 'Description',
            'created_at' => 'Date Created',
            'created_by' => 'Created By',
        ];
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

}
