<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemSubCategory */

$this->title = 'Update Item Sub Category: ' . $model->itp_id;
$this->params['breadcrumbs'][] = ['label' => 'Item Sub Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->itp_id, 'url' => ['view', 'id' => $model->itp_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-sub-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
