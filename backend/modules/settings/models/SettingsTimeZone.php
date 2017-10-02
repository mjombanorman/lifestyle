<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "settings_timezone".
 *
 * @property integer $zone_id
 * @property string $abbreviation
 * @property string $time_start
 * @property integer $gmt_offset
 * @property string $dst
 */
class SettingsTimeZone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings_timezone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zone_id', 'abbreviation', 'time_start', 'gmt_offset', 'dst'], 'required'],
            [['zone_id', 'gmt_offset'], 'integer'],
            [['time_start'], 'number'],
            [['abbreviation'], 'string', 'max' => 6],
            [['dst'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'zone_id' => 'Zone ID',
            'abbreviation' => 'Abbreviation',
            'time_start' => 'Time Start',
            'gmt_offset' => 'Gmt Offset',
            'dst' => 'Dst',
        ];
    }
}
