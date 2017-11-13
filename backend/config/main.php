<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'products' => [
            'class' => 'backend\modules\products\ProductsModule',
        ],
        'users' => [
            'class' => 'backend\modules\users\UsersModule',
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ],
        'blog' => [
            'class' => 'backend\modules\blog\Blog',
        ],
        'settings' => [
            'class' => 'backend\modules\settings\SettingsModule',
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    /* 'userClassName' => 'app\models\User', */
                    //'idField' => 'user_id',
                    'usernameField' => 'username',
                    //  'fullnameField' => 'profile.full_name',
                    'extraColumns' => [
                            [
                            'attribute' => 'full_name',
                            'label' => 'Full Name',
                            'value' => function($model, $key, $index, $column) {
                                return $model->username;
                            },
                        ],
                    ],
                    'searchClass' => 'backend\modules\users\models\UserSearch',
                ]
            ]
        ]
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        //        'user' => [
        //            'identityClass' => 'common\models\User',
        //            'enableAutoLogin' => true,
        //            'identityCookie' => [
        //                'name' => '_backendUser', // unique for backend
        //                'path' => '/admin', // correct path for backend app.
        //                'httpOnly' => true
        //            ]
        //        ],
        'session' => [
            'name' => '_backendSessionId',
            'savePath' => __DIR__ . '/../runtime/sessions',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                    [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    //'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => [
                        'themes/p_theme/assets/plugins/jquery/jquery-1.11.1.min.js',
                    ]
                ],
            // 'yii\bootstrap\BootstrapAsset' => false,
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                '<action>' => 'site/<action>',
            /* '<controller:\w+>/<id:\d+>' => '<controller>/view',
              '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
              '<controller:\w+>/<action:\w+>' => '<controller>/<action>', */
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@vendor/onmotion/yii2-gallery/views' => '@app/views/gallery', // example: @app/views/gallery/default/index.php
                ],
            ],
        ],
        'MyProfile' => [
            'class' => 'backend\components\Profile\MyProfile',
        ],
    ],
    'params' => $params,
    'aliases' => [
        '@mdm/admin' => '@vendor/mdm/yii2-admin-2.0.0',
    // for example: '@mdm/admin' => '@app/extensions/mdm/yii2-admin-2.0.0',
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*',
            'gii/*',
            'debug/*',
            'user/*',
        // The actions listed here will be allowed to everyone including guests.
        // So, 'admin/*' should not appear here in the production, of course.
        // But in the earlier stages of your development, you may probably want to
        // add a lot of actions here until you finally completed setting up rbac,
        // otherwise you may not even take a first step.
        ]
    ],
];
