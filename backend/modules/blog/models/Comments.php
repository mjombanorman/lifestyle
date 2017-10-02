<?php

namespace backend\modules\blog\models;

use Yii;

/**
 * This is the model class for table "blog_comments".
 *
 * @property integer $comment_id
 * @property string $comment_date
 * @property integer $comment_post_id
 * @property integer $comment_author_id
 * @property string $comment_author_IP
 * @property string $comment_content
 * @property integer $comment_status
 * @property integer $comment_like_count
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment_date', 'comment_post_id', 'comment_content'], 'required'],
            [['comment_date'], 'safe'],
            [['comment_post_id', 'comment_author_id', 'comment_status', 'comment_like_count'], 'integer'],
            [['comment_content'], 'string'],
            [['comment_author_IP'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'comment_date' => 'Comment Date',
            'comment_post_id' => 'Comment Post ID',
            'comment_author_id' => 'Comment Author ID',
            'comment_author_IP' => 'Comment Author  Ip',
            'comment_content' => 'Comment Content',
            'comment_status' => 'Comment Status',
            'comment_like_count' => 'Comment Like Count',
        ];
    }
}
