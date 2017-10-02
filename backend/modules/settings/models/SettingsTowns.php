<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "settings_towns".
 *
 * @property integer $id
 * @property string $name
 * @property string $details
 * @property string $created_at
 * @property integer $created_by
 */
class SettingsTowns extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings_towns';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['details'], 'string'],
            [['created_at'], 'safe'],
            [['created_by'], 'integer'],
            [['name'], 'string', 'max' => 256],
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
            'details' => 'Details',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }
}
