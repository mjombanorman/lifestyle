<?php

use yii\helpers\Html;
use backend\modules\users\models\User;
use backend\modules\products\models\Products;
use backend\modules\products\models\Category;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use backend\assets\BootAsset;
use kartik\grid\GridView;

//BootAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\items\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = ['label' => 'Inventory', 'url' => ['/products/products/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluiid container-fixed-lg">
    <div class="row">
        <div class="col-lg-12">


            <?php Pjax::begin(); ?>
            <?php
            $gridColumns = [
                    ['class' => 'kartik\grid\SerialColumn'],
                    [
                    'attribute' => 'name',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->name;
                    },
                    'filter' =>
                    Select2::widget([
                        'model' => $searchModel,
                        'attribute' => 'name',
                        'theme' => Select2::THEME_BOOTSTRAP,
                        'data' => ArrayHelper::map(Products::find()->all(), 'name', 'name'),
                        'options' => ['placeholder' => 'Search'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ]
                    ])
                ], /*
                  [
                  'attribute' => 'itm_sub_cat_id',
                  'format' => 'raw',
                  'value' => function($data) {
                  return $data->itm_sub_cat_id;
                  },
                  'filter' => false,
                  ], */
                    [
                    'attribute' => 'category_id',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->category->name;
                    },
                    'filter' => false,
                ],
                    [
                    'attribute' => 'price',
                    'format' => 'raw',
                    'value' => function($data) {
                        return 'Ksh ' . $data->price;
                    },
                    'filter' => false,
                ],
                    [
                    'attribute' => 'prod_img',
                    'label' => 'Image',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->prod_img ? '<span class="glyphicon glyphicon-ok text-success text-center"></span>' : '<span class="glyphicon glyphicon-remove text-danger"></span>';
                    },
                    'filter' => false,
                ],
                    [
                    'attribute' => 'created_by',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->user->username;
                    },
                    'filter' => false,
                ],
                    [
                    'attribute' => 'created_at',
                    'format' => 'raw',
                    'value' => function($data) {
                        return Yii::$app->formatter->asDate($data->created_at);
                    },
                    'filter' => false,
                ],
                    [
                    'class' => 'kartik\grid\ActionColumn',
                    // 'dropdown' => true,
                    //'vAlign' => 'middle',
                    'width' => '100px',
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'view' => function ($url, $model, $key) {
                            return Html::a('', ['products/view', 'id' => $model->id], [
                                        'class' => 'pg-search text-success',
                                        'value' => Url::to(Yii::$app->urlManager->createUrl(['/products/products/view',
                                                    'id' => $model->id])),
                            ]);
                        },
                        'update' => function($url, $model, $key) {
                            return Html::a('', [NULL], [
                                        'title' => 'Update Product',
                                        'class' => 'showModalButton pg-ui text-warning',
                                        'value' => Url::to(Yii::$app->urlManager->createUrl(['/products/products/update',
                                                    'id' => $model->id])),
                            ]);
                        },
                        'delete' => function($url, $model, $key) {
                            return Html::a('', ['items/delete', 'id' => $model->id], [
                                        'class' => 'pg-eraser text-danger',
                                        'value' => Url::to(Yii::$app->urlManager->createUrl(['/items/items/delete',
                                                    'id' => $model->id])),
                                        'data-pjax' => '1',
                                        'data' => [
                                            'method' => 'post',
                                            'confirm' => Yii::t('app', 'Are you sure you want to delete'),
                                        ],
                            ]);
                        },
                    ],
                    'headerOptions' => ['class' => 'kartik-sheet-style'],
                ],
            ];
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                //'filterPosition' => 'header',
                // 'filterUrl' => Url::to(['index']),
                'columns' => $gridColumns,
                'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
                'toolbar' => [
                        ['content' =>
                        Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => 'Add New Product', 'class' => 'showModalButton btn btn-success', 'value' => Yii::$app->urlManager->createUrl(['/products/products/create'])]) . ' ' .
                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Refresh'])
                    ],
                    '{export}',
                    '{toggleData}'
                ],
                'pjax' => false,
                'bordered' => false,
                'striped' => true,
                'condensed' => true,
                'responsive' => true,
                'hover' => true,
                'showPageSummary' => false,
                'panel' => [
                    'type' => GridView::TYPE_SUCCESS,
                    'heading' => 'All Products',
                    'showFooter' => false,
                ],
            ]);
            ?>
            <?php Pjax::end(); ?>

        </div>
    </div>
</div>
<?php
yii\bootstrap\Modal::begin([
    'header' => '<span id="modalHeaderTitle"></span>',
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'size' => 'modal-lg',
    'options' => [
        'class' => 'fade fill-in disable-scroll',
        'tabindex' => '-1',
        'role' => 'dialog',
        'aria-hidden' => 'true',
    ],
//keeps from closing modal with esc key or by clicking out of the modal.
// user must click cancel or X to close
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo "<div id='modalContent'></div>";
yii\bootstrap\Modal::end();
?>


<?php
//yii\bootstrap\Modal::begin([
//    'header' => '<span id="modalHeaderTitle"></span>',
//    'headerOptions' => ['id' => 'modalHeader'],
//    'id' => 'modal',
//    'size' => 'modal-lg',
//    'options' => [
//        'class' => 'fade fill-in disable-scroll',
//        'tabindex' => '-1',
//        'role' => 'dialog',
//        'aria-hidden' => 'true',
//    ],
////keeps from closing modal with esc key or by clicking out of the modal.
//// user must click cancel or X to close
//    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
//]);
//echo "<div id='modalContent'></div>";
//yii\bootstrap\Modal::end();
?>