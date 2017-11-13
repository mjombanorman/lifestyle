<?php

namespace frontend\models;

use yii\base\Model;
use common\models\User;
use backend\modules\users\models\Address;

/**
 * Signup form
 */
class SignupForm extends Model {

    public $username;
    public $email;
    public $password;
    public $password_confirm;
    public $role;
    public $newsletter;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                ['username', 'trim'],
                ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
                ['username', 'string', 'min' => 2, 'max' => 255],
                ['email', 'trim'],
                ['email', 'required'],
                ['email', 'email'],
                [['email', 'first_name', 'last_name',], 'string', 'max' => 255],
                ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
                [['password', 'password_confirm'], 'required'],
                ['role', 'required'],
                ['password', 'string', 'min' => 6],
                ['password_confirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Passwords do not match'],
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
        $user->username = $this->email;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        if ($user->save(false)) {
            if (!empty($this->role)) {
                $this->assignRole($this->role, $user->id);
            }
            return $user;
        } else {
            return null;
        }
    }

    public function assignRole($role, $user_id) {
        $auth = new \common\models\AuthAssignment();
        $auth->item_name = $role;
        $auth->user_id = $user_id;
        $auth->save(false);
        return true;
    }

}
