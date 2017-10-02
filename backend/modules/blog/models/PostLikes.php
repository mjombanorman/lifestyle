<?php

namespace backend\modules\blog\models;

use Yii;

/**
 * This is the model class for table "blog_post_likes".
 *
 * @property string $like_IP
 * @property integer $post_id
 */
class PostLikes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_post_likes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['like_IP', 'post_id'], 'required'],
            [['post_id'], 'integer'],
            [['like_IP'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'like_IP' => 'Like  Ip',
            'post_id' => 'Post ID',
        ];
    }
}
