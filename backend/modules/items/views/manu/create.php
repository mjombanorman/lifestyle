<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemManu */

$this->title = 'Create Item Manu';
$this->params['breadcrumbs'][] = ['label' => 'Item Manus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-manu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
