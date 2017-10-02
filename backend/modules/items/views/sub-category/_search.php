<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemSubCategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-sub-category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'itp_id') ?>

    <?= $form->field($model, 'itm_main_cat_id') ?>

    <?= $form->field($model, 'itp_name') ?>

    <?= $form->field($model, 'itp_description') ?>

    <?= $form->field($model, 'itp_comments') ?>

    <?php // echo $form->field($model, 'itp_logo') ?>

    <?php // echo $form->field($model, 'itp_active') ?>

    <?php // echo $form->field($model, 'itp_status_date') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
