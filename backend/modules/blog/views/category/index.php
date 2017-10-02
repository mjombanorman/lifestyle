
<?php

use yii\helpers\Html;
use backend\modules\users\models\User;
use backend\modules\blog\models\Posts;
use backend\modules\blog\models\Category;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\items\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Category';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-12">
    <div class="row">
        <div class="grid simple ">
            <div class="grid-title no-border">

            </div>
            <div class="grid-body no-border">
                <?php Pjax::begin();
                ?>
                <?php
                $gridColumns = [
                        ['class' => 'kartik\grid\SerialColumn'],
                        [
                        'attribute' => 'cat_name',
                        'format' => 'raw',
                        'value' => function($data) {
                            return $data->cat_name;
                        },
                        'filter' => false,
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
                        'attribute' => 'cat_desc',
                        'format' => 'raw',
                        'value' => function($data) {
                            return $data->cat_desc;
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
                        'template' => '{update} {delete}',
                        'buttons' => [
                            'update' => function($url, $model, $key) {
                                return Html::a('', [NULL], [
                                            'title' => 'Update Category',
                                            'class' => 'showModalButton glyphicon glyphicon-edit',
                                            'value' => Url::to(Yii::$app->urlManager->createUrl(['/blog/category/update',
                                                        'id' => $model->cat_id])),
                                ]);
                            }, /*
                          'delete' => function($url, $model, $key) {
                          return Html::a('', ['items/delete', 'id' => $model->id], [
                          'class' => 'glyphicon glyphicon-remove',
                          'value' => Url::to(Yii::$app->urlManager->createUrl(['/items/items/delete',
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
                            Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => 'Add New Category', 'class' => 'showModalButton btn btn-success', 'value' => Yii::$app->urlManager->createUrl(['/blog/category/create'])]) . ' ' .
                            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Refresh'])
                        ],
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
                        'heading' => 'Categories',
                        'showFooter' => true,
                    ],
                ]);
                ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>

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

