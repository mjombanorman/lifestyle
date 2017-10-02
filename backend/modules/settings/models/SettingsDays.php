<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "settings_days".
 *
 * @property integer $id
 * @property string $day
 * @property string $day_abb
 * @property integer $active
 */
class SettingsDays extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings_days';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['day'], 'required'],
            [['active'], 'integer'],
            [['day', 'day_abb'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'day' => 'Day',
            'day_abb' => 'Day Abb',
            'active' => 'Active',
        ];
    }
}
