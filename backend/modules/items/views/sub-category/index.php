<?php

use yii\helpers\Html;
use backend\modules\users\models\User;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\modules\items\models\ItemSubCategory;
use yii\helpers\Url;
use kartik\grid\GridView;
use backend\modules\items\models\ItemMainCategory;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\items\models\ItemSubCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Sub Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(); ?>
<?php

$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'attribute' => 'itp_name',
        'format' => 'raw',
        'value' => function($data) {
            return $data->itp_name;
        },
        'filter' =>
        Select2::widget([
            'model' => $searchModel,
            'attribute' => 'itp_name',
            'theme' => Select2::THEME_BOOTSTRAP,
            'data' => ArrayHelper::map(ItemSubCategory::find()->all(), 'itp_name', 'itp_name'),
            'options' => ['placeholder' => 'Search'],
            'pluginOptions' => [
                'allowClear' => true
            ]
        ])
    ],
    [
        'attribute' => 'itm_main_cat_id',
        'format' => 'raw',
        'value' => function($data) {
            return $data->category->ict_name;
        },
        'filter' =>
        Select2::widget([
            'model' => $searchModel,
            'attribute' => 'itm_main_cat_id',
            'theme' => Select2::THEME_BOOTSTRAP,
            'data' => ArrayHelper::map(ItemMainCategory::find()->all(), 'ict_id', 'ict_name'),
            'options' => ['placeholder' => 'Search'],
            'pluginOptions' => [
                'allowClear' => true
            ]
        ])
    ],
    [
        'attribute' => 'itp_description',
        'format' => 'raw',
        'value' => function($data) {
            return $data->itp_description;
        },
        'filter' => false,
    ],
    [
        'attribute' => 'itp_active',
        'format' => 'raw',
        'value' => function($data) {
            return $data->itp_active == 1 ? 'Active' : 'Inactive';
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
        'attribute' => 'date_created',
        'format' => 'raw',
        'value' => function($data) {
            return $data->date_created;
        },
        'filter' => false
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        // 'dropdown' => true,
        //'vAlign' => 'middle',
        'template' => '{view} {update} {delete}',
        'buttons' => [
            'view' => function ($url, $model, $key) {
                return Html::a('', ['sub-category/view', 'id' => $model->itp_id], [
                            'class' => 'glyphicon glyphicon-search',
                            'value' => Url::to(Yii::$app->urlManager->createUrl(['/items/sub-category/view',
                                        'id' => $model->itp_id])),
                ]);
            },
                    'update' => function($url, $model, $key) {
                return Html::a('', [NULL], [
                            'title' => 'Update Sub Category',
                            'class' => 'showModalButton glyphicon glyphicon-edit',
                            'value' => Url::to(Yii::$app->urlManager->createUrl(['/items/sub-category/update',
                                        'id' => $model->itp_id])),
                ]);
            },
                    'delete' => function($url, $model, $key) {
                return Html::a('', ['sub-category/delete', 'id' => $model->itp_id], [
                            'class' => 'glyphicon glyphicon-remove',
                            'value' => Url::to(Yii::$app->urlManager->createUrl(['/items/sub-category/delete',
                                        'id' => $model->itp_id])),
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
                    Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => 'Add New Sub Category', 'class' => 'showModalButton btn btn-success', 'value' => Yii::$app->urlManager->createUrl(['/items/sub-category/create'])]) . ' ' .
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
                'heading' => 'All Sub Categories',
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
