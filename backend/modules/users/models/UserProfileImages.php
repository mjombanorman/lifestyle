<?php

namespace backend\modules\users\models;

use Yii;

/**
 * This is the model class for table "user_profile_images".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $image
 * @property integer $album_id
 * @property integer $is_profile_image
 * @property integer $is_cover_photo
 * @property string $created_at
 */
class UserProfileImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profile_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'album_id', 'is_profile_image', 'is_cover_photo'], 'integer'],
            [['image'], 'required'],
            [['created_at'], 'safe'],
            [['image'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'image' => 'Image',
            'album_id' => 'Album ID',
            'is_profile_image' => 'Is Profile Image',
            'is_cover_photo' => 'Is Cover Photo',
            'created_at' => 'Created At',
        ];
    }
}
