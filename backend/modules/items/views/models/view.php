<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\assets\BootAsset;

BootAsset::Register($this);
/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemModels */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Item Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="button">
<h2><?= Html::encode($this->title) ?></h2>
</div>
<div class="panel panel-widget">
<div class="item-models-view">

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [

            'name',
            [
                'attribute' => 'man_id',
                'value' => $model->make->name,
            ],
            'review_id',
          [
                'attribute' => 'created_at',
                'value' => Yii::$app->formatter->asDate($model->created_at,'long'),
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