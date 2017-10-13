<?php

namespace backend\modules\blog\models;

use Yii;

/**
 * This is the model class for table "blog_newsletter".
 *
 * @property integer $id
 * @property string $email
 * @property string $created_at
 */
class Newsletter extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'blog_newsletter';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['email'], 'required'],
                ['email', 'unique'],
                ['email', 'email'],
                [['created_at'], 'safe'],
                [['email'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'created_at' => 'Created At',
        ];
    }

}
