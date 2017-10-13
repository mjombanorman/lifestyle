<?php

namespace backend\modules\users\models;

use Yii;

/**
 * This is the model class for table "users_view".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property int $status
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $full_name
 * @property string $created_at
 */
class UsersView extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'users_view';
    }

    public static function primaryKey() {
        return ['id'];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['id', 'status'], 'integer'],
                [['username', 'email', 'first_name', 'last_name'], 'required'],
                [['created_at'], 'safe'],
                [['username', 'email'], 'string', 'max' => 256],
                [['first_name', 'middle_name', 'last_name'], 'string', 'max' => 20],
                [['full_name'], 'string', 'max' => 41],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'status' => 'Status',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'full_name' => 'Full Name',
            'created_at' => 'Created At',
        ];
    }

    public static function getFullName($user_id) {
        $user = self::findOne($user_id);
    }

}
