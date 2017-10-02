<?php

/**
 * Created by PhpStorm.
 * Author: Misha Serenkov
 * Email: mi.serenkov@gmail.com
 * Date: 05.03.2017 15:21
 */

namespace data;

use miserenkov\validators\PhoneValidator;
use yii\base\Model;

class TestModel extends Model
{
    public $phone;
    public $phone2;

    public function rules()
    {
        return [
            ['phone', PhoneValidator::className(), 'country' => 'UA'],
            ['phone2', PhoneValidator::className(), 'countries' => ['UA', 'RU', 'GB']],
        ];
    }
}