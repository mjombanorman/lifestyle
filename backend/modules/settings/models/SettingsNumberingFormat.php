<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "settings_numbering_format".
 *
 * @property string $id
 * @property string $type
 * @property string $description
 * @property integer $next_number
 * @property integer $min_digits
 * @property string $prefix
 * @property string $suffix
 * @property string $preview
 * @property string $module
 * @property string $date_created
 * @property string $created_by
 */
class SettingsNumberingFormat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings_numbering_format';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'description'], 'required'],
            [['next_number', 'min_digits', 'created_by'], 'integer'],
            [['date_created'], 'safe'],
            [['type'], 'string', 'max' => 60],
            [['description'], 'string', 'max' => 255],
            [['prefix', 'suffix'], 'string', 'max' => 5],
            [['preview'], 'string', 'max' => 128],
            [['module'], 'string', 'max' => 30],
            [['type'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'description' => 'Description',
            'next_number' => 'Next Number',
            'min_digits' => 'Min Digits',
            'prefix' => 'Prefix',
            'suffix' => 'Suffix',
            'preview' => 'Preview',
            'module' => 'Module',
            'date_created' => 'Date Created',
            'created_by' => 'Created By',
        ];
    }
}
