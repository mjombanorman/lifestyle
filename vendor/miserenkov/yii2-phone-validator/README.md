# Yii2 Phone Validator
Yii2 validator for phone numbers

[![License](https://poser.pugx.org/miserenkov/yii2-phone-validator/license)](https://packagist.org/packages/miserenkov/yii2-phone-validator)
[![Latest Stable Version](https://poser.pugx.org/miserenkov/yii2-phone-validator/v/stable)](https://packagist.org/packages/miserenkov/yii2-phone-validator)
[![Latest Unstable Version](https://poser.pugx.org/miserenkov/yii2-phone-validator/v/unstable)](https://packagist.org/packages/miserenkov/yii2-phone-validator)
[![Total Downloads](https://poser.pugx.org/miserenkov/yii2-phone-validator/downloads)](https://packagist.org/packages/miserenkov/yii2-phone-validator)
[![Build Status](https://travis-ci.org/miserenkov/yii2-phone-validator.svg?branch=master)](https://travis-ci.org/miserenkov/yii2-phone-validator)

## Support

[GitHub issues](https://github.com/miserenkov/yii2-phone-validator).


## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist miserenkov/yii2-phone-validator "^1.0"
```

or add

```
"miserenkov/yii2-phone-validator": "^1.0"
```

to the require section of your `composer.json` file.

## Basic usages

#### With fixed country value
```php
public function rules()
{
    return [
        // ...
        ['phone', \miserenkov\validators\PhoneValidator::className(), 'country' => 'UA'],
        // ...
    ];
}
```


#### With fixed country attribute
```php
public function rules()
{
    return [
        // ...
        ['country', 'string'],
        ['phone', \miserenkov\validators\PhoneValidator::className(), 'countryAttribute' => 'country'],
        // ...
    ];
}
```

#### With fixed countries value
```php
public function rules()
{
    return [
        // ...
        ['phone', \miserenkov\validators\PhoneValidator::className(), 'countries' => ['UA', 'RU', 'US', /*...*/]],
        // ...
    ];
}
```

#### With all countries
```php
public function rules()
{
    return [
        // ...
        ['phone', \miserenkov\validators\PhoneValidator::className()],
        // ...
    ];
}
```