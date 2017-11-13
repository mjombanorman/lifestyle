<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\products\models\Products */

$this->title = 'Update Product: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="products-update">

    <h4 class="text-success "> &nbsp;&nbsp;<i class="fa fa-edit"></i>&nbsp;<?= Html::encode($this->title) ?></h4>

    <?php
    echo
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
