<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "settings_currency".
 *
 * @property string $id
 * @property string $code
 * @property string $description
 * @property string $symbol
 * @property integer $is_active
 * @property integer $decimal_places
 * @property string $decimal_separator
 * @property string $thousands_separator
 * @property string $date_created
 * @property string $created_by
 */
class SettingsCurrency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings_currency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'description', 'symbol'], 'required'],
            [['is_active', 'decimal_places', 'created_by'], 'integer'],
            [['date_created'], 'safe'],
            [['code'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 128],
            [['symbol'], 'string', 'max' => 60],
            [['decimal_separator', 'thousands_separator'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'description' => 'Description',
            'symbol' => 'Symbol',
            'is_active' => 'Is Active',
            'decimal_places' => 'Decimal Places',
            'decimal_separator' => 'Decimal Separator',
            'thousands_separator' => 'Thousands Separator',
            'date_created' => 'Date Created',
            'created_by' => 'Created By',
        ];
    }
}
