<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use backend\modules\users\models\Address;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $gender;
    public $phone;
    public $country;
    public $town;
    public $newsletter;
    public $user_level;
    public $address;
    public $password_confirm;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            [['first_name','last_name','gender','phone','country','town','address', 'newsletter'], 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            [['email','first_name','last_name','phone'], 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            [['gender','town'],'integer'],
            [['password','password_confirm'], 'required'],
            ['password', 'string', 'min' => 6],
            ['password_confirm','compare','compareAttribute'=>'password','message'=>'Passwords do not match'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
       

        $user = new User();
        $user->username = $this->email;
        $user->email = $this->email;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->phone = $this->phone;
        $user->town = $this->town;
        $user->newsletter = $this->newsletter;
        $user->user_level = 2;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $address = new Address();
        $address->town_id = $this->town;
        $address->address = $this->address;
        if($user->save(false)){
            $address->user_id = $user->id;
            $address->save(False);
            return $user;
        }else{
            return null;
        }
    }

}
