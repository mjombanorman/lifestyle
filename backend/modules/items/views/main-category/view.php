<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\assets\ViewAsset;
use backend\assets\BootAsset;

BootAsset::Register($this);
/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemMainCategory */

$this->title = $model->ict_name;
$this->params['breadcrumbs'][] = ['label' => 'Item Main Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="button">
<h2><?= Html::encode($this->title) ?></h2>
</div>
<div class="panel panel-widget">
<div class="item-main-category-view">

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [

            'ict_name',
            'ict_desc:ntext',
      
            [
            'attribute'=>'date_created',
            'value'=> Yii::$app->formatter->asDate($model->date_created,'long'),
            ],
            [
                'attribute' => 'created_by',
                'value' => $model->user->username
            ]
        ],
    ])
    ?>

</div>
</div>
