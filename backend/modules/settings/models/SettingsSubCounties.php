<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "settings_sub_counties".
 *
 * @property integer $id
 * @property double $county_code
 * @property double $const_code
 * @property string $const_name
 */
class SettingsSubCounties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings_sub_counties';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['county_code', 'const_code'], 'number'],
            [['const_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'county_code' => 'County Code',
            'const_code' => 'Const Code',
            'const_name' => 'Const Name',
        ];
    }
}
