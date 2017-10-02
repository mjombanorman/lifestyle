<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemManu */

$this->title = 'Update Item Manu: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Item Manus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-manu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
