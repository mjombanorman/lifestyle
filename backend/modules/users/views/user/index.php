<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\users\models\UsersViewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Users';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);
?>
<div class="users-view-index">
    <div id="ajaxCrudDatatable">
        <?=
        GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => FALSE,
            'columns' => require(__DIR__ . '/_columns.php'),
            'toolbar' => [
                    ['content' =>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['title' => 'Add New User', 'class' => 'btn btn-success']) .
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''], ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
                    '{toggleData}' .
                    '{export}'
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'info',
                'heading' => '<i class="glyphicon glyphicon-list"></i> All Users',
                'before' => '',
            ]
        ])
        ?>
    </div>
</div>
<?php
Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
])
?>
<?php Modal::end(); ?>
