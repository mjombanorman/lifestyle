<?php

use yii\helpers\Html;
use backend\modules\users\models\User;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\users\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-12">
    <div class="row">
        <div class="grid simple ">
            <div class="grid-title no-border">

            </div>
            <div class="grid-body no-border">
                <?php Pjax::begin(); ?>
                <?php
                $gridColumns = [
                        ['class' => 'kartik\grid\SerialColumn'],
                        [
                        'attribute' => 'username',
                        'format' => 'raw',
                        'value' => function($data) {
                            return $data->username;
                        },
                        'filter' =>
                        Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'username',
                            'theme' => Select2::THEME_BOOTSTRAP,
                            'data' => ArrayHelper::map(User::find()->all(), 'username', 'username'),
                            'options' => ['placeholder' => 'Search'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]
                        ])
                    ],
                        [
                        'attribute' => 'email',
                        'format' => 'raw',
                        'value' => function($data) {
                            return $data->email;
                        },
                        'filter' => false,
                    ],
                        [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => function($data) {
                            return $data->status;
                        },
                        'filter' => false,
                    ],
                        [
                        'attribute' => 'user_level',
                        'format' => 'raw',
                        'value' => function($data) {
                            return $data->user_level == 2 ? 'Client' : 'Admin';
                        },
                        'filter' => false,
                    ],
                        [
                        'attribute' => 'created_at',
                        'format' => 'raw',
                        'value' => function($data) {
                            return Yii::$app->formatter->asDate($data->created_at, 'long');
                        },
                        'filter' => false,
                    ],
                        /* [
                          'class' => 'kartik\grid\ActionColumn',
                          // 'dropdown' => true,
                          //'vAlign' => 'middle',
                          'template' => '{view}',
                          'buttons' => [
                          'view' => function ($url, $model, $key) {
                          return Html::a('', ['user/view', 'id' => $model->id], [
                          'class' => 'glyphicon glyphicon-search',
                          'value' => Url::to(Yii::$app->urlManager->createUrl(['/users/user/view',
                          'id' => $model->id])),
                          ]);
                          },
                          'update' => function($url, $model, $key) {
                          return Html::a('', [NULL], [
                          'title' => 'Update Model',
                          'class' => 'showModalButton glyphicon glyphicon-edit',
                          'value' => Url::to(Yii::$app->urlManager->createUrl(['/users/user/update',
                          'id' => $model->id])),
                          ]);
                          },
                          'delete' => function($url, $model, $key) {
                          return Html::a('', ['models/delete', 'id' => $model->id], [
                          'class' => 'glyphicon glyphicon-remove',
                          'value' => Url::to(Yii::$app->urlManager->createUrl(['/users/user/delete',
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
                          ], */
                ];
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'filterUrl' => Url::to(['index']),
                    'columns' => $gridColumns,
                    'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
                    'toolbar' => [
                            ['content' =>
                            Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => 'Add New Model', 'class' => 'showModalButton btn btn-success', 'value' => Yii::$app->urlManager->createUrl(['/users/user/create'])]) . ' ' .
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
                        'heading' => 'All Users',
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

