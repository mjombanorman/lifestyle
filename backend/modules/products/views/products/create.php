<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\products\models\Products */

$this->title = 'Add New Product';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-create">

    <h4 class="text-success "> &nbsp;&nbsp;<i class="fa fa-plus-circle"></i>&nbsp;<?= Html::encode($this->title) ?></h4>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
