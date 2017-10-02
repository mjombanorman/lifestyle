<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemMainCategory */

$this->title = 'Update Item Main Category: ' . $model->ict_id;
$this->params['breadcrumbs'][] = ['label' => 'Item Main Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ict_id, 'url' => ['view', 'id' => $model->ict_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-main-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
