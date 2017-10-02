<?php

namespace backend\modules\blog\models;

use Yii;

/**
 * This is the model class for table "blog_posts".
 *
 * @property integer $post_id
 * @property string $post_date
 * @property string $post_title
 * @property integer $post_author_id
 * @property string $post_content
 * @property integer $post_status
 * @property integer $post_category_id
 * @property integer $post_like_count
 * @property integer $post_share_count
 */
class Posts extends \yii\db\ActiveRecord {

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'blog_posts';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['post_date'], 'safe'],
                [['post_title', 'post_author_id', 'post_img', 'post_category_id'], 'required'],
                [['post_author_id', 'post_status', 'post_category_id', 'post_like_count', 'post_share_count'], 'integer'],
                [['post_content'], 'string'],
                [['post_title'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'post_id' => 'Post ID',
            'post_date' => 'Created',
            'post_title' => 'Title',
            'post_author_id' => 'Author',
            'post_content' => 'Content',
            'post_status' => 'Status',
            'post_category_id' => 'Category',
            'post_like_count' => 'Likes',
            'post_share_count' => 'Shared',
            'post_img' => 'Cover Image'
        ];
    }

    public function generateStatus() {
        return [
            Posts::STATUS_ACTIVE => 'Active',
            Posts::STATUS_INACTIVE => 'Inactive',
        ];
    }

    public function getAuthor() {
        return $this->hasOne(\common\models\User::className(), ['id' => 'post_author_id']);
    }

    public function getCategory() {
        return $this->hasOne(Category::className(), ['cat_id' => 'post_category_id']);
    }

}
