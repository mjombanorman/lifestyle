<?php

namespace backend\modules\users\models;

use Yii;

/**
 * This is the model class for table "user_address".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $county
 * @property int $town
 * @property int $location
 * @property double $longitude
 * @property double $latitude
 * @property string $adddress
 * @property string $created_at
 */
class UserAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'county', 'town', 'location'], 'integer'],
            [['name', 'adddress'], 'required'],
            [['longitude', 'latitude'], 'number'],
            [['adddress'], 'string'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 20],
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
            'name' => 'Name',
            'county' => 'County',
            'town' => 'Town',
            'location' => 'Location',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'adddress' => 'Adddress',
            'created_at' => 'Created At',
        ];
    }
}
