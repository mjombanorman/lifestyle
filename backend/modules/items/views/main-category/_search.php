<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemMainCategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-main-category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ict_id') ?>

    <?= $form->field($model, 'ict_name') ?>

    <?= $form->field($model, 'ict_desc') ?>

    <?= $form->field($model, 'ict_usage') ?>

    <?= $form->field($model, 'ict_uom') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
