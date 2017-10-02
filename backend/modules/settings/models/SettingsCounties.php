<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "settings_counties".
 *
 * @property integer $id
 * @property string $county
 * @property string $tour
 * @property string $former_province
 * @property double $area
 * @property double $population_census_2009
 * @property string $capital
 */
class SettingsCounties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings_counties';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'county', 'tour', 'former_province', 'area', 'population_census_2009'], 'required'],
            [['id'], 'integer'],
            [['area', 'population_census_2009'], 'number'],
            [['county', 'tour', 'former_province', 'capital'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'county' => 'County',
            'tour' => 'Tour',
            'former_province' => 'Former Province',
            'area' => 'Area',
            'population_census_2009' => 'Population Census 2009',
            'capital' => 'Capital',
        ];
    }
}
