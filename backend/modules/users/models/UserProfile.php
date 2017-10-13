<?php

namespace backend\modules\users\models;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $gender
 * @property string $phone
 * @property string $phone2
 * @property string $country
 * @property int $id_no
 * @property int $passport_no
 * @property string $dob
 * @property int $address
 * @property string $marital_status
 * @property string $created_at
 * @property string $updated_at
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'id_no', 'passport_no', 'address'], 'integer'],
            [['first_name', 'last_name', 'gender', 'phone'], 'required'],
            [['gender', 'marital_status'], 'string'],
            [['dob', 'created_at', 'updated_at'], 'safe'],
            [['first_name', 'middle_name', 'last_name'], 'string', 'max' => 20],
            [['phone', 'phone2'], 'string', 'max' => 12],
            [['country'], 'string', 'max' => 4],
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
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'gender' => 'Gender',
            'phone' => 'Phone',
            'phone2' => 'Phone2',
            'country' => 'Country',
            'id_no' => 'Id No',
            'passport_no' => 'Passport No',
            'dob' => 'Dob',
            'address' => 'Address',
            'marital_status' => 'Marital Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
