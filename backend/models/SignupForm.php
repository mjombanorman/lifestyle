<?php

namespace backend\models;

use yii\base\Model;
use common\models\User;
use backend\modules\shop\models\Shops;

/**
 * Signup form
 */
class SignupForm extends Model {

    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $biz_name;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['username', 'trim'],
            [['username','biz_name','password_repeat'], 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            [['username','biz_name'], 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            [['password','password_repeat'], 'string', 'min' => 6],
            ['password_repeat','compare','compareAttribute'=>'password','message'=>'Passwords do not match'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup() {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->status = User::STATUS_ACTIVE;
        $user->user_level = User::STATUS_CUSTOMER;
        //$user->created_at = date('Y m d, h:m:s');
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }

}
