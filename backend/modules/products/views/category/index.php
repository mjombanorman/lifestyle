
<?php

use yii\helpers\Html;
use backend\modules\users\models\User;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\modules\products\models\Category;
use yii\helpers\Url;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\items\models\ItemSubCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = ['label' => 'Inventory', 'url' => ['/products/categories/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-12">
    <div class="row">

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
                    'data' => ArrayHelper::map(Category::find()->all(), 'name', 'name'),
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
                'attribute' => 'date_created',
                'format' => 'raw',
                'value' => function($data) {
                    return Yii::$app->formatter->asDate($data->created_at, 'long');
                },
                'filter' => false,
            ],
                [
                'class' => 'kartik\grid\ActionColumn',
                // 'dropdown' => true,
                //'vAlign' => 'middle',
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('', ['main-category/view', 'id' => $model->id], [
                                    'class' => 'glyphicon glyphicon-search',
                                    'value' => Url::to(Yii::$app->urlManager->createUrl(['/products/category/view',
                                                'id' => $model->id])),
                        ]);
                    },
                    'update' => function($url, $model, $key) {
                        return Html::a('', [NULL], [
                                    'title' => 'Update Category',
                                    'class' => 'showModalButton glyphicon glyphicon-edit',
                                    'value' => Url::to(Yii::$app->urlManager->createUrl(['/products/category/update',
                                                'id' => $model->id])),
                        ]);
                    },
                /*   'delete' => function($url, $model, $key) {
                  return Html::a('', ['main-category/delete', 'id' => $model->id], [
                  'class' => 'glyphicon glyphicon-remove',
                  'value' => Url::to(Yii::$app->urlManager->createUrl(['/items/main-category/delete',
                  'id' => $model->id])),
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
                    Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => 'Add New Category', 'class' => 'showModalButton btn btn-success', 'value' => Yii::$app->urlManager->createUrl(['/products/category/create'])]) . ' ' .
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Refresh'])
                ],
                '{export}',
                '{toggleData}'
            ],
            'pjax' => false,
            'bordered' => true,
            'striped' => true,
            'condensed' => false,
            'responsive' => true,
            'hover' => true,
            'showPageSummary' => true,
            'panel' => [
                'type' => GridView::TYPE_DEFAULT,
                'heading' => 'Product Categories',
                'showFooter' => true,
            ],
        ]);
        ?>
        <?php Pjax::end(); ?>

    </div>
</div>

<?php
yii\bootstrap\Modal::begin([
    'header' => '<span id="modalHeaderTitle"></span>',
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'size' => 'modal-md',
    'options' => [
        'class' => 'fade slide-up disable-scroll',
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
