<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\assets\BootAsset;

BootAsset::Register($this);
/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemSubCategory */

$this->title = $model->itp_name;
$this->params['breadcrumbs'][] = ['label' => 'Item Sub Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="button">
<h2><?= Html::encode($this->title) ?></h2>
</div>
<div class="panel panel-widget">
<div class="item-sub-category-view">


    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [

            [
                'attribute' => 'itm_main_cat_id',
                'value' => $model->category->ict_name,
            ],
            'itp_name',
            'itp_description:ntext',
            [
                'attribute' => 'itp_active',
                'value' => $model->itp_active == 1 ? 'Active' : 'Inactive',
            ],
            'itp_status_date',
            [
                'attribute' => 'date_created',
                'value' => Yii::$app->formatter->asDate($model->date_created),
            ],
            [
                'attribute' => 'created_by',
                'value' => $model->user->username,
            ],
        ],
    ])
    ?>

</div>
</div>