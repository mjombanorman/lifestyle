<?php

return [
    'id' => 'lifestyle1.0',
    'name' => 'Healthy Lifestyle',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
//        'user' => [
//            'class' => 'dektrium\user\Module',
//        ],
        'user' => [
            'class' => Da\User\Module::class,
            'classMap' => [
                'Profile' => '@app\models\Profile',
            ],
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@Da/User/resources/views' => '@app/views/site'
                ]
            ]
        ],
    ],
];
