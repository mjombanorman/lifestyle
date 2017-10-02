<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "settings_payment_methods".
 *
 * @property integer $id
 * @property string $payment_type
 * @property string $active
 * @property string $date_created
 * @property integer $created_by
 */
class SettingsPaymentMethods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings_payment_methods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_type'], 'required'],
            [['active'], 'string'],
            [['date_created'], 'safe'],
            [['created_by'], 'integer'],
            [['payment_type'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_type' => 'Payment Type',
            'active' => 'Active',
            'date_created' => 'Date Created',
            'created_by' => 'Created By',
        ];
    }
}
