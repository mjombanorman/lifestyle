<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "settings_zone".
 *
 * @property integer $zone_id
 * @property string $country_code
 * @property string $zone_name
 */
class SettingsZone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings_zone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_code', 'zone_name'], 'required'],
            [['country_code'], 'string', 'max' => 2],
            [['zone_name'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'zone_id' => 'Zone ID',
            'country_code' => 'Country Code',
            'zone_name' => 'Zone Name',
        ];
    }
}
