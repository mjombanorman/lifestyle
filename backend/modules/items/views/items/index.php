<?php

use yii\helpers\Html;
use backend\modules\users\models\User;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\modules\items\models\Items;
use yii\helpers\Url;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\items\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(); ?>
<?php

$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'attribute' => 'itm_name',
        'format' => 'raw',
        'value' => function($data) {
            return $data->itm_name;
        },
        'filter' =>
        Select2::widget([
            'model' => $searchModel,
            'attribute' => 'itm_name',
            'theme' => Select2::THEME_BOOTSTRAP,
            'data' => ArrayHelper::map(Items::find()->all(), 'itm_name', 'itm_name'),
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
        'attribute' => 'itm_cat_id',
        'format' => 'raw',
        'value' => function($data) {
            return $data->category->ict_name;
        },
        'filter' => false,
    ],
    [
        'attribute' => 'itm_serial',
        'format' => 'raw',
        'value' => function($data) {
            return $data->itm_serial;
        },
        'filter' => false,
    ],
    [
        'attribute' => 'itm_price',
        'format' => 'raw',
        'value' => function($data) {
            return 'Ksh ' . $data->itm_price;
        },
        'filter' => false,
    ],
    [
        'attribute' => 'itm_shop_id',
        'format' => 'raw',
        'value' => function($data) {
            return $data->shop->name;
        },
        'filter' => false,
    ],
    [
        'attribute' => 'itm_man_id',
        'format' => 'raw',
        'value' => function($data) {
            return $data->manu->name;
        },
        'filter' => false,
    ],
    [
        'attribute' => 'itm_model',
        'format' => 'raw',
        'value' => function($data) {
            return $data->model->name;
        },
        'filter' => false,
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        // 'dropdown' => true,
        //'vAlign' => 'middle',
        'template' => '{view} {update} {delete}',
        'buttons' => [
            'view' => function ($url, $model, $key) {
                return Html::a('', ['items/view', 'id' => $model->itm_id], [
                            'class' => 'glyphicon glyphicon-search',
                            'value' => Url::to(Yii::$app->urlManager->createUrl(['/items/items/view',
                                        'id' => $model->itm_id])),
                ]);
            },
                    'update' => function($url, $model, $key) {
                return Html::a('', [NULL], [
                            'title' => 'Update Item',
                            'class' => 'showModalButton glyphicon glyphicon-edit',
                            'value' => Url::to(Yii::$app->urlManager->createUrl(['/items/items/update',
                                        'id' => $model->itm_id])),
                ]);
            }, /*
                  'delete' => function($url, $model, $key) {
                  return Html::a('', ['items/delete', 'id' => $model->itm_id], [
                  'class' => 'glyphicon glyphicon-remove',
                  'value' => Url::to(Yii::$app->urlManager->createUrl(['/items/items/delete',
                  'id' => $model->itm_id])),
                  'data-pjax' => '1',
                  'data' => [
                  'method' => 'post',
                  'confirm' => Yii::t('app', 'Are you sure you want to delete'),
                  ],
                  ]);
                  }, */
                ],
                'headerOptions' => ['class' => 'kartik-sheet-style'],
            ],
        ];
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'filterUrl' => Url::to(['index']),
            'columns' => $gridColumns,
            'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
            'toolbar' => [
                ['content' =>
                    Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => 'Add New Item', 'class' => 'showModalButton btn btn-success', 'value' => Yii::$app->urlManager->createUrl(['/items/items/create'])]) . ' ' .
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Refresh'])
                ],
                '{export}',
                '{toggleData}'
            ],
            'pjax' => false,
            'bordered' => true,
            'striped' => false,
            'condensed' => false,
            'responsive' => true,
            'hover' => true,
            'showPageSummary' => true,
            'panel' => [
                'type' => GridView::TYPE_DEFAULT,
                'heading' => 'All Items',
                'showFooter' => true,
            ],
        ]);
        ?>
        <?php Pjax::end(); ?>
       

        <?php

        yii\bootstrap\Modal::begin([
            'header' => '<span id="modalHeaderTitle"></span>',
            'headerOptions' => ['id' => 'modalHeader'],
            'id' => 'modal',
            'size' => 'modal-md',
            //keeps from closing modal with esc key or by clicking out of the modal.
            // user must click cancel or X to close
            'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
        ]);
        echo "<div id='modalContent'></div>";
        yii\bootstrap\Modal::end();
        ?>
