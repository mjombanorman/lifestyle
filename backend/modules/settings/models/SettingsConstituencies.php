<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "settings_constituencies".
 *
 * @property integer $id
 * @property string $name
 * @property integer $county_id
 * @property string $country_code
 */
class SettingsConstituencies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings_constituencies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'county_id'], 'required'],
            [['county_id'], 'integer'],
            [['name'], 'string', 'max' => 30],
            [['country_code'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'county_id' => 'County ID',
            'country_code' => 'Country Code',
        ];
    }
}
