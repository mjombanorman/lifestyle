<?php

/**
 * Created by PhpStorm.
 * Author: Misha Serenkov
 * Email: mi.serenkov@gmail.com
 * Date: 05.03.2017 14:56
 */

namespace miserenkov\validators;

use yii\validators\Validator;
use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;

/**
 * Phone validator class that validates phone numbers for given
 * country and formats.
 * Country codes and attributes value should be ISO 3166-1 alpha-2 codes
 */
class PhoneValidator extends Validator
{
    /**
     * @var string The country is fixed
     */
    public $country;

    /**
     * @var array The fixed countries
     */
    public $countries;

    /**
     * @var string The country attribute of model
     */
    public $countryAttribute;

    /**
     * @var bool If phone number is valid formats value with international phone number
     */
    public $format = true;

    /**
     * @var string
     */
    public $notValidPhoneNumberMessage;

    /**
     * @var string
     */
    public $numberParseExceptionMessage;

    /**
     * PhoneNumberUtil Instance
     * @var PhoneNumberUtil
     */
    private static $_phoneUtil = null;

    /**
     * @var bool
     */
    private $_successValidation = false;

    public function init()
    {
        parent::init();

        if (empty($this->notValidPhoneNumberMessage)) {
            $this->notValidPhoneNumberMessage = 'Phone number does not seem to be a valid phone number';
        }

        if (empty($this->numberParseExceptionMessage)) {
            $this->numberParseExceptionMessage = 'Unexpected Phone Number Format';
        }
    }

    /**
     * Validate attribute
     *
     * @param \yii\base\Model $model
     * @param string $attribute
     *
     * @return bool
     */
    public function validateAttribute($model, $attribute)
    {
        $countries = [];
        if ($this->country !== null) {
            $countries = [$this->country];
        } elseif ($this->countryAttribute !== null) {
            $countries = [$model->{$this->countryAttribute}];
        } elseif (is_array($this->countries) && count($this->countries) > 0) {
            $countries = $this->countries;
        }

        if (count($countries) <= 0) {
            $countries = self::getPhoneUtil()->getSupportedRegions();
        }

        foreach ($countries as $country) {
            try {
                $number = self::getPhoneUtil()->parse($model->$attribute, $country);

                if (self::getPhoneUtil()->isValidNumberForRegion($number, $country)) {
                    if ($this->format) {
                        $model->$attribute = self::getPhoneUtil()->format($number, PhoneNumberFormat::INTERNATIONAL);
                    }

                    $this->_successValidation = true;
                    break;
                }
            } catch (NumberParseException $e) {
                $this->addError($model, $attribute, $this->numberParseExceptionMessage);
            }
        }

        if (!$this->_successValidation) {
            $this->addError($model, $attribute, $this->notValidPhoneNumberMessage);
        }

        return $this->_successValidation;
    }

    /**
     * @return PhoneNumberUtil
     */
    public static function getPhoneUtil()
    {
        if (self::$_phoneUtil === null) {
            self::$_phoneUtil = PhoneNumberUtil::getInstance();
        }

        return self::$_phoneUtil;
    }
}