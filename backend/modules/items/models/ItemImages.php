<?php

namespace backend\modules\items\models;

use Yii;

/**
 * This is the model class for table "item_images".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $item_id
 * @property string $created_at
 * @property integer $created_by
 */
class ItemImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['item_id', 'created_by'], 'integer'],
            [['name', 'description', 'created_at'], 'string', 'max' => 45],
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
            'description' => 'Description',
            'item_id' => 'Item ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }
}
