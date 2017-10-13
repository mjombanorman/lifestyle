<?php

namespace backend\components\Profile;

use Yii;
use yii\base\Component;
use backend\modules\users\models\UsersView;
use backend\modules\users\models\UserProfile;
use backend\modules\users\models\ProfileImages;

?>
<?php

class MyProfile extends Component {

    public function getName() {
        $user_id = Yii::$app->user->id;
        return $this->findMyName($user_id);
    }

    public function findMyName($user_id) {
        return UsersView::findOne($user_id);
    }

    public function getProfile() {
        $user_id = Yii::$app->user->id;
        return $this->findMyProfile($user_id);
    }

    public function findMyProfile($user_id) {
        return UserProfile::find()->where(['user_id' => $user_id])->one();
    }

    public function getProfileImage() {
        Yii::setAlias('@user', Yii::$app->request->BaseUrl . '/images/user_images');
        $user_id = Yii::$app->user->id;
        $model = $this->findMyImage($user_id);

        if ($model == NULL) {
            return \yii\helpers\Url::to('@user', true) . "/user.png";
        } else if ($model->image != null) {
            return \yii\helpers\Url::to('@user' . '/' . $user_id . '/', true) . $model->image;
        } else {
            return \yii\helpers\Url::to('@user', true) . "/user.png";
        }
    }

    public function findMyImage($user_id) {
        return ProfileImages::find()->where(['user_id' => $user_id])->one();
    }

}

?>