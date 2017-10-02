<?php

use yii\helpers\Html;
use backend\modules\users\models\User;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\modules\items\models\ItemManu;
use yii\helpers\Url;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\items\models\ItemManuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Manufacturers';
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
            'data' => ArrayHelper::map(ItemManu::find()->all(), 'name', 'name'),
            'options' => ['placeholder' => 'Search'],
            'pluginOptions' => [
                'allowClear' => true
            ]
        ])
    ],
    [
        'attribute' => 'description',
        'format' => 'raw',
        'value' => function($data) {
            return $data->description;
        },
        'contentOptions' => ['style' => 'width:250px;  min-width:240px;  '],
        'filter' => false,
    ],
    [
        'attribute' => 'website',
        'format' => 'raw',
        'value' => function($data) {
            return $data->website;
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
            return Yii::$app->formatter->asDate($data->created_at);
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
                return Html::a('', ['manu/view', 'id' => $model->id], [
                            'class' => 'glyphicon glyphicon-search',
                            'value' => Url::to(Yii::$app->urlManager->createUrl(['/items/manu/view',
                                        'id' => $model->id])),
                ]);
            },
                    'update' => function($url, $model, $key) {
                return Html::a('', [NULL], [
                            'title' => 'Update Manufacturer',
                            'class' => 'showModalButton glyphicon glyphicon-edit',
                            'value' => Url::to(Yii::$app->urlManager->createUrl(['/items/manu/update',
                                        'id' => $model->id])),
                ]);
            },
                    'delete' => function($url, $model, $key) {
                return Html::a('', ['main-category/delete', 'id' => $model->id], [
                            'class' => 'glyphicon glyphicon-remove',
                            'value' => Url::to(Yii::$app->urlManager->createUrl(['/items/manu/delete',
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
                    Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => 'Add New Manufacturer', 'class' => 'showModalButton btn btn-success', 'value' => Yii::$app->urlManager->createUrl(['/items/manu/create'])]) . ' ' .
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
                'heading' => 'All Manufacturers',
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
