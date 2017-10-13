<?php

use yii\helpers\Url;
use backend\modules\users\models\UsersView;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;

return [
//        [
//        'class' => 'kartik\grid\CheckboxColumn',
//        'width' => '20px',
//    ],
//        [
//        'class' => 'kartik\grid\SerialColumn',
//        'width' => '30px',
//    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],

        [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'full_name',
        'filter' => Select2::widget([
            'model' => $searchModel,
            'attribute' => 'full_name',
            'data' => ArrayHelper::map(UsersView::find()->all(), 'full_name', 'full_name'),
            'options' => ['placeholder' => 'Search ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]),
    ],
        [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'username',
        'filter' => false,
    ],
        [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'email',
        'filter' => false,
    ],
        [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'status',
        'format' => 'raw',
        'value' => function($model) {
            return $model->status == 10 ? '<span class="label label-success">Active</span>' : '<span class="label label-danger  ">Inactive</span>';
        },
        'filter' => false,
    ],
        [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'created_at',
        'format' => 'raw',
        'value' => function($model) {
            return Yii::$app->formatter->asDate($model->created_at);
        },
        'filter' => false,
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'last_name',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'full_name',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'created_at',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{view}',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => ['role' => '', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => '', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false, // for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'],
    ],
];
