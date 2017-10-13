<?php

namespace backend\modules\users\models;

use Yii;
use backend\modules\users\models\ProfileImages;

/**
 * This is the model class for table "user_profile_images".
 *
 * @property int $id
 * @property int $user_id
 * @property string $image
 * @property int $album_id
 * @property int $is_profile_image
 * @property int $is_cover_photo
 * @property string $created_at
 */
class ProfileImages extends \yii\db\ActiveRecord {

    public $profile_img;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user_profile_images';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['profile_img'], 'required'],
                [['user_id', 'album_id', 'is_profile_image', 'is_cover_photo'], 'integer'],
                [['created_at', 'profile_img'], 'safe'],
                [['image'], 'string', 'max' => 256],
                [['profile_img',], 'file', 'extensions' => 'jpg, gif, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'image' => 'Image',
            'album_id' => 'Album ID',
            'is_profile_image' => 'Is Profile Image',
            'is_cover_photo' => 'Is Cover Photo',
            'profile_img' => 'Profile Image',
            'created_at' => 'Created At',
        ];
    }

    public function getProfileImage($user_id) {
        Yii::setAlias('@theme', Yii::$app->request->BaseUrl . '/themes/p_theme');
        Yii::setAlias('@user', Yii::$app->request->BaseUrl . '/images/user_images');
        $model = ProfileImages::find()->where(
                        [
                            'user_id' => $user_id,
                            'is_profile_image' => 1
                ])->orderBy(['id' => SORT_DESC])->one();
        if ($model == NULL) {
            return \yii\helpers\Url::to('@user', true) . "/user.png";
        } else if ($model->image != null) {
            return \yii\helpers\Url::to('@user' . '/' . $user_id . '/', true) . $model->image;
        } else {
            return \yii\helpers\Url::to('@user', true) . "/user.png";
        }
    }

}
