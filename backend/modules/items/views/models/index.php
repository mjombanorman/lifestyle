<?php

use yii\helpers\Html;
use backend\modules\users\models\User;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\modules\items\models\ItemModels;
use yii\helpers\Url;
use kartik\grid\GridView;
use backend\modules\items\models\ItemManu;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\items\models\ItemModelsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Models';
$this->params['breadcrumbs'][] = $this->title;
?>
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
            'data' => ArrayHelper::map(ItemModels::find()->all(), 'name', 'name'),
            'options' => ['placeholder' => 'Search'],
            'pluginOptions' => [
                'allowClear' => true
            ]
        ])
    ],
    [
        'attribute' => 'man_id',
        'format' => 'raw',
        'value' => function($data) {
            return $data->make->name;
        },
        'filter' => false,
    ],
    [
        'attribute' => 'description',
        'format' => 'raw',
        'value' => function($data) {
            return $data->description;
        },
        'filter' => false,
    ],
    [
        'attribute' => 'created_by',
        'format' => 'raw',
        'value' => function($data) {
            return User::findOne($data->created_by)->username;
        },
        'filter' => false,
    ],
    [
        'attribute' => 'created_at',
        'format' => 'raw',
        'value' => function($data) {
            return $data->created_at;
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
                return Html::a('', ['models/view', 'id' => $model->id], [
                            'class' => 'glyphicon glyphicon-search',
                            'value' => Url::to(Yii::$app->urlManager->createUrl(['/items/models/view',
                                        'id' => $model->id])),
                ]);
            },
                    'update' => function($url, $model, $key) {
                return Html::a('', [NULL], [
                            'title' => 'Update Model',
                            'class' => 'showModalButton glyphicon glyphicon-edit',
                            'value' => Url::to(Yii::$app->urlManager->createUrl(['/items/models/update',
                                        'id' => $model->id])),
                ]);
            },
                    'delete' => function($url, $model, $key) {
                return Html::a('', ['models/delete', 'id' => $model->id], [
                            'class' => 'glyphicon glyphicon-remove',
                            'value' => Url::to(Yii::$app->urlManager->createUrl(['/items/models/delete',
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
            'filterModel' => $searchModel,
            'filterUrl' => Url::to(['index']),
            'columns' => $gridColumns,
            'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
            'toolbar' => [
                ['content' =>
                    Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => 'Add New Model', 'class' => 'showModalButton btn btn-success', 'value' => Yii::$app->urlManager->createUrl(['/items/models/create'])]) . ' ' .
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
                'heading' => 'All Models',
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
